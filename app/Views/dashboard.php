<?= $this->extend('layouts/main') ?>

<!---------------------------------------------------------------->
<!-- Head -->
<?= $this->section('body') ?>

<title>Company | Dashboard</title>

<?= $this->endSection() ?>

<!---------------------------------------------------------------->
<!-- Body -->
<?= $this->section('body') ?>

<script type='text/javascript' charset='utf-8'>
    webix.ready(function() {
        webix.ui({
            css: 'background',
            align: 'center,middle',
            body: {
                align: 'center,middle', template: '<h2>Welcome to your dashboard</h2>', height: 200, width: 200
            }
        });
    });   
</script>    

<?= $this->endSection() ?>