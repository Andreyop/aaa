<?php

/* @var $this yii\web\View */
/** @var float $totalEarnings */
/** @var int $totalOrders */
/** @var int $totalProducts */
/** @var int $totalUsers */
/** @var array $labels */
/** @var array $data */
/** @var array $countries */
/** @var array $countriesData */
/** @var array $bgColors */

$this->title = 'Po-polam';
?>

    <div class="site-index">
        <!-- Content Row -->
        <div class="row">
            <!-- Earnings -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Заработок
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo Yii::$app->formatter->asCurrency($totalEarnings) ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products sold -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Проданные товары
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $totalProducts ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders made -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Сделанные заказы
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $totalOrders ?>
                                </div>
                            </div>
                            <div class="col-auto">
<!--                                <i class="fas fa-money-check-alt fa-2x text-gray-300"></i>-->
                              <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Si Total Users -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Всего пользователей
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $totalUsers ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


