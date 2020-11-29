<?php require_once ('./admin_includes/header.php'); ?>

<body>

    <div id="wrapper">

        <?php require_once ('./admin_includes/nav.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <div class="col-lg-12">

                        <h1 class="page-header">
                
                            Welcome

                            <small>

                            <?php if (isset($_SESSION['db_user_name'])) {
                                
                                echo $_SESSION['db_user_name'];

                            }
                            
                            ?>

                            </small>

                        </h1>

                    </div>

                </div>
                <!-- /.row -->

                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                            <?php 
                            
                                $sql = "select * from posts";
                                $count = mysqli_query($con,$sql);
                                $num_post = mysqli_num_rows($count);
                            
                            ?>

                  <div class='huge'><?php echo $num_post ?></div>

                        <div>Posts</div>

                    </div>

                </div>

            </div>

            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    
                    <?php 
                            
                            $sql = "select * from comments";
                            $count_comments = mysqli_query($con,$sql);
                            $num_comments = mysqli_num_rows($count_comments);
                        
                        ?>

                     <div class='huge'><?php echo $num_comments ?></div>

                      <div>Comments</div>

                    </div>

                </div>

            </div>

            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 
                            
                            $sql = "select * from users";
                            $count_users = mysqli_query($con,$sql);
                            $num_users = mysqli_num_rows($count_users);
                        
                        ?>

                    <div class='huge'><?php echo $num_users ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 
                            
                            $sql = "select * from categories";
                            $count_cat = mysqli_query($con,$sql);
                            $num_cat = mysqli_num_rows($count_cat);
                        
                        ?>

                        <div class='huge'><?php echo $num_cat ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>

            </a>

        </div>

    </div>
    
</div>
                <!-- /.row -->
            
                    <div class="row">

                        <div class="col">

                            <div class="container">

                            <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

            <?php 
            
                $static_data = ['Posts', 'Comments', 'Users', 'Categories'];
                $dynamic_data = [$num_post, $num_comments, $num_users, $num_cat];

                for ($i=0; $i<4; $i++) { 
                    
                    echo "['{$static_data[$i]}'" . "," . "{$dynamic_data[$i]}],";

                }

            ?>

         /*  ['Posts', 20] */
        ]);

        var materialOptions = {
          width: 900,
          chart: {
            title: '',
            subtitle: ''
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'parsecs'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

        var classicOptions = {
          width: 900,
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: 'Nearby galaxies - distance on the left, brightness on the right',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'parsecs'},
            1: {title: 'apparent magnitude'}
          }
        };

        function drawMaterialChart() {
          var materialChart = new google.charts.Bar(chartDiv);
          materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
          button.innerText = 'Change to Classic';
          button.onclick = drawClassicChart;
        }

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawMaterialChart();
    };
    </script>

                <div id="chart_div" style="height: 500px;"></div>
                
                            </div>

                        </div>
                
                    </div>
           

 
            <?php require_once ('./admin_includes/footer.php'); ?>