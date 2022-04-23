  <div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#"><?php echo e(env('APP_NAME')); ?></a>

      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#"><?php echo e(Str::limit(env('APP_NAME'), $limit = 1)); ?></a>
      </div>
      <ul class="sidebar-menu">
        <?php if(Auth::user()->role_id==1): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard')): ?>
        <li class="<?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
           <i class="flaticon-dashboard"></i> <span><?php echo e(__('Dashboard')); ?></span>
          </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order.list')): ?>
       <li class="<?php echo e(Request::is('admin/order*') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('admin.order.index')); ?>">
           <i class="flaticon-note"></i> <span><?php echo e(__('Orders')); ?></span>
          </a>
        </li>
        <?php endif; ?>

        <?php
        $plan=false;            
        ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plan.create')): ?>
        <?php
           $plan=true; 
        ?>
        <?php endif; ?> 
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plan.list')): ?>
        <?php
        $plan=true;            
        ?>
        <?php endif; ?>
        <?php if($plan == true): ?>
        <li class="dropdown <?php echo e(Request::is('admin/plan*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-pricing"></i> <span><?php echo e(__('Plans')); ?></span></a>
          <ul class="dropdown-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plan.create')): ?>
            <li><a class="nav-link <?php echo e(Request::is('admin/plan/create') ? 'active' : ''); ?>" href="<?php echo e(route('admin.plan.create')); ?>"><?php echo e(__('Create')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('plan.list')): ?>
            <li><a class="nav-link <?php echo e(Request::is('admin/plan') ? 'active' : ''); ?>" href="<?php echo e(route('admin.plan.index')); ?>"><?php echo e(__('All Plans')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>

        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report.view')): ?>
        <li class="<?php echo e(Request::is('admin/report*') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('admin.report')); ?>">
            <i class="flaticon-dashboard-1"></i> <span><?php echo e(__('Reports')); ?></span>
          </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.create','customer.list','customer.request','customer.list')): ?>
        <li class="dropdown <?php echo e(Request::is('admin/customer*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-customer"></i> <span>Customers</span></a>
          <ul class="dropdown-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.create')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.customer.create')); ?>"><?php echo e(__('Create Customer')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.list')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.customer.index')); ?>"><?php echo e(__('All Customers')); ?></a></li>
            <?php endif; ?> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.request')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.customer.index','type=3')); ?>"><?php echo e(__('Customer Request')); ?></a></li>
            <?php endif; ?> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer.list')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.customer.index','type=2')); ?>"><?php echo e(__('Suspended Customers')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('domain.create','domain.list')): ?>
         <li class="dropdown <?php echo e(Request::is('admin/domain*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-www"></i> <span><?php echo e(__('Domains')); ?></span></a>
          <ul class="dropdown-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('domain.create')): ?>
            <li><a class="nav-link <?php echo e(Request::is('admin/domain/create') ? 'active' : ''); ?>" href="<?php echo e(route('admin.domain.create')); ?>"><?php echo e(__('Create Domain')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('domain.list')): ?>
            <li><a class="nav-link <?php echo e(Request::is('admin/domain') ? 'active' : ''); ?>" href="<?php echo e(route('admin.domain.index')); ?>"><?php echo e(__('All Domains')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cron_job')): ?>
         <li class="<?php echo e(Request::is('admin/cron') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('admin.cron.index')); ?>">
            <i class="flaticon-task"></i> <span><?php echo e(__('Cron Jobs')); ?></span>
          </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_gateway.config')): ?>
         <li class="<?php echo e(Request::is('admin/payment-geteway*') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('admin.payment-geteway.index')); ?>" >
            <i class="flaticon-credit-card"></i> <span><?php echo e(__('Payment Gateways')); ?></span>
          </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('template.list')): ?>
        <li class="<?php echo e(Request::is('admin/template') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('admin.template.index')); ?>">
            <i class="flaticon-template"></i> <span><?php echo e(__('Templates')); ?></span>
          </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page.create','page.list')): ?>
        <li class="dropdown <?php echo e(Request::is('admin/page*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-document"></i> <span><?php echo e(__('Pages')); ?></span></a>
          <ul class="dropdown-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page.create')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.page.create')); ?>"><?php echo e(__('Create Pages')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page.list')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.page.index')); ?>"><?php echo e(__('All Pages')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_edit')): ?>
        <li class="dropdown <?php echo e(Request::is('admin/language*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-translation"></i> <span><?php echo e(__('Language')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo e(route('admin.language.create')); ?>"><?php echo e(__('Create language')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('admin.language.index')); ?>"><?php echo e(__('Manage language')); ?></a></li>
          </ul>
        </li>
        <?php endif; ?>
       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site.settings')): ?>
        <li class="dropdown <?php echo e(Request::is('admin/appearance*') ? 'active' : ''); ?>  <?php echo e(Request::is('admin/gallery*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/menu*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/seo*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-settings"></i> <span><?php echo e(__('Appearance')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo e(route('admin.appearance.show','header')); ?>"><?php echo e(__('Frontend Settings')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('admin.gallery.index')); ?>"><?php echo e(__('Gallery')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('admin.menu.index')); ?>"><?php echo e(__('Menu')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('admin.seo.index')); ?>"><?php echo e(__('SEO')); ?></a></li>
          </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('marketing.tools')): ?>
         <li class="<?php echo e(Request::is('admin/marketing') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('admin.marketing.index')); ?>">
           <i class="flaticon-megaphone"></i> <span><?php echo e(__('Marketing Tools')); ?></span>
          </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site.settings','environment.settings')): ?>
         <li class="dropdown <?php echo e(Request::is('admin/site-settings*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/system-environment*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-settings"></i> <span><?php echo e(__('Settings')); ?></span></a>
          <ul class="dropdown-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site.settings')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.site.settings')); ?>"><?php echo e(__('Site Settings')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('environment.settings')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.site.environment')); ?>"><?php echo e(__('System Environment')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

       
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.list','role.list')): ?>
         <li class="dropdown <?php echo e(Request::is('admin/role*') ? 'active' : ''); ?> <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-member"></i> <span><?php echo e(__('Admins & Roles')); ?></span></a>
          <ul class="dropdown-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.list')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.role.index')); ?>"><?php echo e(__('Roles')); ?></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.list')): ?>
            <li><a class="nav-link" href="<?php echo e(route('admin.users.index')); ?>"><?php echo e(__('Admins')); ?></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php endif; ?>

        <?php endif; ?>

        <?php if(Auth::user()->role_id==3): ?>
        
        <li class="<?php echo e(Request::is('seller/dashboard*') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('seller.dashboard')); ?>">
            <i class="flaticon-dashboard"></i> <span><?php echo e(__('Dashboard')); ?></span>
          </a>
        </li>

        <li class="dropdown <?php echo e(Request::is('seller/order*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-note"></i> <span><?php echo e(__('Orders')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo e(url('/seller/orders/all')); ?>"><?php echo e(__('All Orders')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(url('/seller/orders/canceled')); ?>"><?php echo e(__('Canceled')); ?></a></li>

          </ul>
        </li>

        <li class="dropdown <?php echo e(Request::is('seller/product*') ? 'active' : ''); ?> <?php echo e(Request::is('seller/inventory*') ? 'active' : ''); ?> <?php echo e(Request::is('seller/category*') ? 'active' : ''); ?> <?php echo e(Request::is('seller/attribute*') ? 'active' : ''); ?> <?php echo e(Request::is('seller/brand*') ? 'active' : ''); ?> <?php echo e(Request::is('seller/coupon*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-box"></i> <span><?php echo e(__('Products')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo e(route('seller.product.index')); ?>"><?php echo e(__('All Products')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.inventory.index')); ?>"><?php echo e(__('Inventory')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.category.index')); ?>"><?php echo e(__('Categories')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.attribute.index')); ?>"><?php echo e(__('Attributes')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.brand.index')); ?>"><?php echo e(__('Brands')); ?></a></li>
              <li><a class="nav-link" href="<?php echo e(route('seller.coupon.index')); ?>"><?php echo e(__('Coupons')); ?></a></li>
          </ul>
        </li>
        <?php if(env('MULTILEVEL_CUSTOMER_REGISTER') == true): ?>
        <li class="<?php echo e(Request::is('seller/customer*') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('seller.customer.index')); ?>">
            <i class="flaticon-customer"></i> <span><?php echo e(__('Customers')); ?></span>
          </a>
        </li>
        <?php endif; ?>

        <li class="<?php echo e(Request::is('seller/transection*') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('seller.transection.index')); ?>">
            <i class="flaticon-credit-card"></i> <span><?php echo e(__('Transactions')); ?></span>
          </a>
        </li>

        <li class="<?php echo e(Request::is('seller/report*') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('seller.report.index')); ?>">
            <i class="flaticon-dashboard-1"></i> <span><?php echo e(__('Reports')); ?></span>
          </a>
        </li>
        <li class="<?php echo e(Request::is('seller/review*') ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo e(route('seller.review.index')); ?>">
            <i class="flaticon-dashboard-1"></i> <span><?php echo e(__('Review & Ratings')); ?></span>
          </a>
        </li>


      

        <li class="dropdown <?php echo e(Request::is('seller/location*') ? 'active' : ''); ?> <?php echo e(Request::is('seller/shipping*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-delivery"></i> <span><?php echo e(__('Shipping')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo e(route('seller.location.index')); ?>"><?php echo e(__('locations')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.shipping.index')); ?>"><?php echo e(__('Shipping Price')); ?></a></li>
          </ul>
        </li>

        <li class="dropdown <?php echo e(Request::is('seller/ads*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-megaphone"></i> <span><?php echo e(__('Offer & Ads')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo e(route('seller.ads.index')); ?>"><?php echo e(__('Bump Ads')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.ads.show','banner')); ?>"><?php echo e(__('Banner Ads')); ?></a></li>
          </ul>
        </li>

        <li class="dropdown <?php echo e(Request::is('seller/settings*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-settings"></i> <span><?php echo e(__('Settings')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo e(route('seller.settings.show','shop-settings')); ?>"><?php echo e(__('Shop Settings')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.settings.show','payment')); ?>"><?php echo e(__('Payment Options')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.settings.show','plan')); ?>"><?php echo e(__('Subscriptions')); ?></a></li>
            
          </ul>
        </li>
          <li class="dropdown <?php echo e(Request::is('seller/marketing*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="flaticon-megaphone"></i> <span><?php echo e(__('Marketing Tools')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?php echo e(route('seller.marketing.show','google-analytics')); ?>"><?php echo e(__('Google Analytics')); ?></a></li>
             <li><a class="nav-link" href="<?php echo e(route('seller.marketing.show','tag-manager')); ?>"><?php echo e(__('Google Tag Manager')); ?></a></li>
            <li><a class="nav-link" href="<?php echo e(route('seller.marketing.show','facebook-pixel')); ?>"><?php echo e(__('Facebook Pixel')); ?></a></li>
             <li><a class="nav-link" href="<?php echo e(route('seller.marketing.show','whatsapp')); ?>"><?php echo e(__('Whatsapp Api')); ?></a></li>
          
          </ul>
        </li>
        <li class="menu-header"><?php echo e(__('SALES CHANNELS')); ?></li>
        <li class="dropdown <?php echo e(Request::is('seller/setting*') ? 'active' : ''); ?>">
          <a href="#" class="nav-link has-dropdown"><i class="flaticon-shop"></i> <span><?php echo e(__('Online store')); ?></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo e(route('seller.theme.index')); ?>"><?php echo e(__('Themes')); ?></a></li> 
            <li><a href="<?php echo e(route('seller.menu.index')); ?>"><?php echo e(__('Menus')); ?></a></li> 
            <li><a href="<?php echo e(route('seller.page.index')); ?>"><?php echo e(__('Pages')); ?></a></li> 
            <li><a href="<?php echo e(route('seller.slider.index')); ?>"><?php echo e(__('Sliders')); ?></a></li> 
            <li><a href="<?php echo e(route('seller.seo.index')); ?>"><?php echo e(__('Seo')); ?></a></li> 

          </ul>
        </li>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="<?php echo e(domain_info('full_domain')); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-external-link-alt"></i><?php echo e(__('Your Website')); ?>

          </a>
        </div> 
        <?php endif; ?>      
      </aside>
    </div><?php /**PATH D:\Work\dokan\Dokan\files\script\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>