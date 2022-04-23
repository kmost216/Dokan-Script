
<?php $__env->startSection('content'); ?>

<section class="section">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4><?php echo e(__('Subscribers')); ?></h4>
          </div>
          <div class="card-body" id="total_subscribers">
            <img src="<?php echo e(asset('uploads/loader.gif')); ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4><?php echo e(__('Domain Request')); ?></h4>
          </div>
          <div class="card-body" id="total_domain_requests">
            <img src="<?php echo e(asset('uploads/loader.gif')); ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4><?php echo e(__('Total Earnings')); ?></h4>
          </div>
          <div class="card-body" id="total_earnings">
            <img src="<?php echo e(asset('uploads/loader.gif')); ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4><?php echo e(__('Expired Subscriptions')); ?></h4>
          </div>
          <div class="card-body" id="total_expired_subscriptions">
            <img src="<?php echo e(asset('uploads/loader.gif')); ?>">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title"><?php echo e(__('Order Statistics')); ?> -
            <div class="dropdown d-inline">
              <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month" id="orders-month"><?php echo e(Date('F')); ?></a>
              <ul class="dropdown-menu dropdown-menu-sm">
                <li class="dropdown-title"><?php echo e(__('Select Month')); ?></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='January'): ?> active <?php endif; ?>" data-month="January" ><?php echo e(__('January')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='February'): ?> active <?php endif; ?>" data-month="February" ><?php echo e(__('February')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='March'): ?> active <?php endif; ?>" data-month="March" ><?php echo e(__('March')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='April'): ?> active <?php endif; ?>" data-month="April" ><?php echo e(__('April')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='May'): ?> active <?php endif; ?>" data-month="May" ><?php echo e(__('May')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='June'): ?> active <?php endif; ?>" data-month="June" ><?php echo e(__('June')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='July'): ?> active <?php endif; ?>" data-month="July" ><?php echo e(__('July')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='August'): ?> active <?php endif; ?>" data-month="August" ><?php echo e(__('August')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='September'): ?> active <?php endif; ?>" data-month="September" ><?php echo e(__('September')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='October'): ?> active <?php endif; ?>" data-month="October" ><?php echo e(__('October')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='November'): ?> active <?php endif; ?>" data-month="November" ><?php echo e(__('November')); ?></a></li>
                <li><a href="#" class="dropdown-item month <?php if(Date('F')=='December'): ?> active <?php endif; ?>" data-month="December" ><?php echo e(__('December')); ?></a></li>
              </ul>
            </div>
          </div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count" id="pending_order"></div>
              <div class="card-stats-item-label"><?php echo e(__('Pending')); ?></div>
            </div>

            <div class="card-stats-item">
              <div class="card-stats-item-count" id="completed_order"></div>
              <div class="card-stats-item-label"><?php echo e(__('Completed')); ?></div>
            </div>

            <div class="card-stats-item">
              <div class="card-stats-item-count" id="shipping_order"></div>
              <div class="card-stats-item-label"><?php echo e(__('Expired')); ?></div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4><?php echo e(__('Total Orders')); ?></h4>
          </div>
          <div class="card-body" id="total_order">

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-chart">
          <canvas id="sales_of_earnings_chart" height="80"></canvas>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Sales Of Earnings - <?php echo e(date('Y')); ?></h4>
          </div>
          <div class="card-body" id="sales_of_earnings">
            <img src="<?php echo e(asset('uploads/loader.gif')); ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-chart">
          <canvas id="total_sales_chart" height="80"></canvas>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Sales - <?php echo e(date('Y')); ?></h4>
          </div>
          <div class="card-body" id="total_sales">
            <img src="<?php echo e(asset('uploads/loader.gif')); ?>" class="loads">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-12 col-12 col-sm-12">
     <div class="card">
      <div class="card-header">

        <h4 class="card-header-title"><?php echo e(__('Earnings performance')); ?> <img src="<?php echo e(asset('uploads/loader.gif')); ?>" height="20" id="earning_performance"></h4>
        <div class="card-header-action">
          <select class="form-control" id="perfomace">
            <option value="7"><?php echo e(__('Last 7 Days')); ?></option>
            <option value="15"><?php echo e(__('Last 15 Days')); ?></option>
            <option value="30"><?php echo e(__('Last 30 Days')); ?></option>
            <option value="365"><?php echo e(__('Last 365 Days')); ?></option>
          </select>
        </div>
      </div>
      <div class="card-body">
        <canvas id="myChart" height="100"></canvas> 
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4><?php echo e(__('Recent Request')); ?></h4>
      </div>
      <div class="card-body">
        <ul class="list-unstyled list-unstyled-border">
          <?php $__currentLoopData = $request_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="media">
            <a href="<?php echo e(route('admin.customer.show',$row->id)); ?>"><img class="mr-3 rounded-circle" width="50" src="https://ui-avatars.com/api/?name=<?php echo e($row->name); ?>&background=random" alt="avatar"></a>
            <div class="media-body">
              <div class="float-right text-primary mt-3"><a href="<?php echo e(route('admin.customer.show',$row->id)); ?>"><?php echo e($row->created_at->diffForHumans()); ?></a></div>
              <div class="media-title  mt-3"><a href="<?php echo e(route('admin.customer.show',$row->id)); ?>"><?php echo e($row->name); ?></a></div>
            </div>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="text-center pt-1 pb-1">
          <?php if(count($request_users) == 4): ?>
          <a href="<?php echo e(route('admin.customer.index','type=3')); ?>" class="btn btn-primary btn-lg btn-round">
            View All
          </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4><a href="<?php echo e(route('admin.order.index','status=2')); ?>"><?php echo e(__('Recent Orders')); ?></a></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-nowrap card-table text-center">
            <thead>
              <tr>
                <th class="text-left" ><?php echo e(__('Order')); ?></th>
                <th ><?php echo e(__('Date')); ?></th>
                <th><?php echo e(__('Customer')); ?></th>
                <th class="text-right"><?php echo e(__('Order total')); ?></th>
                <th><?php echo e(__('Payment Method')); ?></th>
                <th><?php echo e(__('Payment Status')); ?></th>
                <th><?php echo e(__('Fulfillment')); ?></th>
                <th class="text-right"><?php echo e(__('Action')); ?></th>
              </tr>
            </thead>
            <tbody class="list font-size-base rowlink" data-link="row">
              <?php $__currentLoopData = $orders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>

                <td class="text-left"><a href="<?php echo e(route('admin.order.invoice',$row->id)); ?>"><?php echo e($row->order_no); ?></a></td>
                <td><?php echo e($row->created_at->format('d-F-Y')); ?></td>
                <td><a href="<?php echo e(route('admin.customer.show',$row->user->id)); ?>"><?php echo e($row->user->name); ?></a></td>
                <td><?php echo e(amount_format($row->amount)); ?></td>
                <td><?php echo e($row->payment_method->method->name ?? ''); ?></td>
                <td><?php if(!empty($row->payment_method)): ?>
                  <?php if($row->payment_method->status==1): ?>
                  <span class="badge badge-success"><?php echo e(__('Paid')); ?></span>
                  <?php else: ?>
                  <span class="badge badge-danger"><?php echo e(__('Fail')); ?></span>
                  <?php endif; ?>
                  <?php endif; ?>
                </td>

                <td>
                  <?php if($row->status == 1): ?> <span class="badge badge-success">Approved</span> <?php elseif($row->status == 2): ?> <span class="badge badge-warning"><?php echo e(__('Pending')); ?></span><?php elseif($row->status == 3): ?> <span class="badge badge-danger"><?php echo e(__('Expired')); ?></span><?php else: ?> <span class="badge badge-danger"><?php echo e(__('Cancelled')); ?></span> <?php endif; ?>

                </td>
                <td> <div class="dropdown d-inline">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo e(__('Action')); ?>

                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item has-icon" href="<?php echo e(route('admin.order.edit',$row->id)); ?>"><i class="far fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                    <a class="dropdown-item has-icon" href="<?php echo e(route('admin.order.show',$row->id)); ?>"><i class="far fa-eye"></i> <?php echo e(__('View')); ?></a>
                    <a class="dropdown-item has-icon" href="<?php echo e(route('admin.order.invoice',$row->id)); ?>"><i class="fa fa-file-invoice"></i> <?php echo e(__('Download Invoice')); ?></a>

                  </div>
                </div></td>
              </tr> 
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<div class="row">
  <div class="col-lg-12 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Site Analytics</h4>
        <div class="card-header-action">
          <select class="form-control" id="days"> 
            <option value="7">Last 7 Days</option>
            <option value="15">Last 15 Days</option>
            <option value="30">Last 30 Days</option>
            <option value="180">Last 180 Days</option>
            <option value="365">Last 365 Days</option>
          </select>
        </div>
      </div>
      <div class="card-body">
        <canvas id="google_analytics" height="120"></canvas>
        <div class="statistic-details mt-sm-4">
          <div class="statistic-details-item">

            <div class="detail-value" id="total_visitors"></div>
            <div class="detail-name">Total Vistors</div>
          </div>
          <div class="statistic-details-item">

            <div class="detail-value" id="total_page_views"></div>
            <div class="detail-name">Total Page Views</div>
          </div>

          <div class="statistic-details-item">

            <div class="detail-value" id="new_vistors"></div>
            <div class="detail-name">New Visitor</div>
          </div>

          <div class="statistic-details-item">

            <div class="detail-value" id="returning_visitor"></div>
            <div class="detail-name">Returning Visitor</div>
          </div>

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
          <div class="card-header">
            <h4>Referral URL</h4>
          </div>
          <div class="card-body refs" id="refs" >



          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4>Top Browser</h4>
          </div>
          <div class="card-body">
            <div class="row" id="browsers"></div>
          </div>
        </div>

      </div>

      <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
          <div class="card-header">
            <h4><?php echo e(__('Top Most Visit Pages')); ?></h4>
          </div>
          <div class="card-body tmvp" id="table-body">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="base_url" value="<?php echo e(url('/')); ?>">
<input type="hidden" id="site_url" value="<?php echo e(url('/')); ?>">
<input type="hidden" id="dashboard_static" value="<?php echo e(route('admin.dashboard.static')); ?>">
<input type="hidden" id="dashboard_perfomance" value="<?php echo e(url('/admin/dashboard/perfomance')); ?>">
<input type="hidden" id="dashboard_order_statics" value="<?php echo e(url('/admin/dashboard/order_statics')); ?>">
<input type="hidden" id="gif_url" value="<?php echo e(asset('uploads/loader.gif')); ?>">
<input type="hidden" id="month" value="<?php echo e(date('F')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/index-0.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>