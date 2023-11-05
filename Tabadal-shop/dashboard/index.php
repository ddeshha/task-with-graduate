<?php
    $current = "index";
    require_once('./includes/header.php');
?>
<div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tabadal Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Products </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
                                            <?php  
                                                $select = "SELECT * FROM products" ;
                                                
                                                $query = $conn -> query($select);
                                                
                                                $num = $query  -> num_rows ;
                                                
                                                echo $num ;
                                                
                                            ?>
                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fab fa-product-hunt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Category </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
                                            <?php  
								
                                                $select = "SELECT * FROM category" ;
                                                
                                                $query = $conn -> query($select);
                                                
                                                $num = $query  -> num_rows ;
                                                
                                                echo $num ;
                                                
                                            ?>
                            </div>
                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-closed-captioning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Brand </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
                                            <?php  
								
                                                $select = "SELECT * FROM brand" ;
                                                
                                                $query = $conn -> query($select);
                                                
                                                $num = $query  -> num_rows ;
                                                
                                                echo $num ;
                                                
                                            ?>
                            </div>
                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fab fa-bitcoin"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Country </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
                                            <?php  
                                                $select = "SELECT * FROM city" ;
                                                
                                                $query = $conn -> query($select);
                                                
                                                $num = $query  -> num_rows ;
                                                
                                                echo $num ;
                                                
                                            ?>
                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-home"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Brandas </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
                                            <?php  
								
                                                $select = "SELECT * FROM brands" ;
                                                
                                                $query = $conn -> query($select);
                                                
                                                $num = $query  -> num_rows ;
                                                
                                                echo $num ;
                                                
                                            ?>
                            </div>
                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fab fa-bitcoin"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php  
                                            
                                            $select = "SELECT * FROM users" ;
                                            
                                            $query = $conn -> query($select) ;
                                            
                                            $num = $query  -> num_rows ;
                                            
                                            echo $num ;
								        ?>
                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Messages</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $select = "SELECT * FROM messages" ;
                                    
                                                    $query = $conn -> query($select) ;
                                                    
                                                    $num = $query  -> num_rows ;
                                                    
                                                    echo $num ;
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php require_once 'includes/charts.php' ?>
                </div>
<?php
    require_once('./includes/footer.php');
?>