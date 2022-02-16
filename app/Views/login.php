<?= $this->extend('layouts/main') ?>

<!---------------------------------------------------------------->
<!-- Head -->
<?= $this->section('body') ?>

<link rel='stylesheet' href='/css/login.css'>
<title>Company | Login</title>

<?= $this->endSection() ?>

<!---------------------------------------------------------------->
<!-- Body -->
<?= $this->section('body') ?>

<script type='text/javascript' charset='utf-8'>
    var form = [
        { template: '<center><img class="logo" src="/img/logo.png"></center>', height: 150, borderless: true },
        { view: 'text', label: 'Username', name: 'username'},
        { view: 'text', label: 'Password', name: 'password', type: 'password'},
        { css: 'webix_primary', view: 'button', value: 'Login', click:submitForm }
    ];

    function submitForm(id, event) {
        webix.ajax().post('/login/auth', $$('login-form').getValues()).then(function(data) {
            if (data.text() == 1)
                window.location.replace("/dashboard");
        }).fail(function(data) {
            webix.ui({
                id: 'wrong-credentials',
                view: 'popup',
                position: 'center',
                head: 'Access denied',
                modal: true,
                body: {
                    rows: [
                        { template: 'Wrong username or password, please try again.' },
                            { css: 'webix_primary', view: 'button', value: 'Accept', position: 'right', click:function() {
                                $$('wrong-credentials').close();
                            }
                        }
                    ]
                }
            }).show();
        });
    };

    webix.ready(function() {
        webix.ui({
            css: 'background',
            align: 'center,middle',
            body: {
                css: 'login-form',
                view: 'form', 
                id: 'login-form',
                width: 300,
                elements: form
            }
        });
    });   
</script>    

<?= $this->endSection() ?>