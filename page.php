<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php 
    require_once 'lib/Weather/WeatherApi.php';
    $weather = new WeatherApi();
    $city = get_the_title();
    $country = get_post_field('post_content', $post_id);
    $weather = $weather->callAPI($country, $city);
    $weather_list = $weather['list'];
  ?>


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


