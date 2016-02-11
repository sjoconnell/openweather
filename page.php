<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php include 'city-api.php'; ?>


<?php for ($i = 0; $i < 5; $i++) {?>
  <div class="weather-section">
    <h1><?php if($i == 0){echo "Current";}else{echo "Day ".$i;}?></h1>
    <h3>Temp: <?= $weather_list[$i]['main']['temp'] ?> </h3>
    <h3>MaxTemp: <?= $weather_list[$i]['main']['temp_min'] ?> </h3>
    <h3>MinTemp: <?= $weather_list[$i]['main']['temp_max'] ?> </h3>
    <br>
  </div>
<?php } ?>

<?php endwhile; ?>
