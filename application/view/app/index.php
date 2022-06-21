<?php
$this->include('app.layouts.header',['categories' => $categories]);
?>

    <section class="container my-5">
    <!-- Example row of columns -->
    <section class="row">
<?php foreach ($articles as $article) { ?>
    <section class="col-md-4">
        <h2><?php echo $article['title']; ?> </h2>
                <p><?php echo substr($article['body'],0,120); ?></p>
                <p><a class="btn btn-primary" href="<?php $this->url('home/detail/' . $article['id']);?>" role="button">View details</a></p>
            </section>
            <?php } ?>
    </section>

<?php
$this->include('app.layouts.footer');
?>