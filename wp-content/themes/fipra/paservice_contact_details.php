<?php require('../../../wp-blog-header.php');

$id = $_GET['id'];
$name = get_field('first_name', $id) . ' ' . get_field('last_name', $id);

?>

<?php if ( has_post_thumbnail($id) ) : ?>
    <img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'thumbnail' )[0]; ?>" alt="<?= $name; ?>" title="<?= $name; ?>"/>
<?php endif; ?>

<div class="details">
    <?php $tel = get_field('tel', $id); ?>
    <?php if($tel) : ?>
        <br><span class="font-14">Tel. <?= get_field('tel', $id) ?></span>
    <?php endif; ?>

    <?php $fax = get_field('fax', $id); ?>
    <?php if($fax) : ?>
        <br><span class="font-14">Fax. <?= get_field('fax', $id) ?></span>
    <?php endif; ?>
    <!--TODO update mailto link-->
    <br><span class="font-14"><a href="mailto:#"><?= get_field('email', $id) ?></a></span><br><br>

    <span class="font-14" style="font-weight: bold;"><a href="<?= get_the_permalink($id); ?>" class="btn btn-small primary">View <?= get_field('first_name', $id); ?>'s profile</a></span>

</div>
