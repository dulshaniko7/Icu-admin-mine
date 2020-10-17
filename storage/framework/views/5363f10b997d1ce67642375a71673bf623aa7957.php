<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="<?php echo e(route("admin.home")); ?>">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    <?php echo e(trans('global.dashboard')); ?>

                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span><?php echo e(trans('cruds.userManagement.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                            <li class="<?php echo e(request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.permissions.index")); ?>">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span><?php echo e(trans('cruds.permission.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                            <li class="<?php echo e(request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.roles.index")); ?>">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span><?php echo e(trans('cruds.role.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                            <li class="<?php echo e(request()->is("admin/users") || request()->is("admin/users/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.users.index")); ?>">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span><?php echo e(trans('cruds.user.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_access')): ?>
                <li class="<?php echo e(request()->is("admin/products") || request()->is("admin/products/*") ? "active" : ""); ?>">
                    <a href="<?php echo e(route("admin.products.index")); ?>">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span><?php echo e(trans('cruds.product.title')); ?></span>

                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax_access')): ?>
                <li class="<?php echo e(request()->is("admin/taxes") || request()->is("admin/taxes/*") ? "active" : ""); ?>">
                    <a href="<?php echo e(route("admin.taxes.index")); ?>">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span><?php echo e(trans('cruds.tax.title')); ?></span>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shopping_access')): ?>
                <li class="<?php echo e(request()->is("shop/home") || request()->is("shop/home/*") ? "active" : ""); ?>">
                    <a href="<?php echo e(route("user.home")); ?>">
                        <i class="fa-fw fas fa-shopping-cart">

                        </i>
                        <span>Shop</span>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_alert_access')): ?>
                <li class="<?php echo e(request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : ""); ?>">
                    <a href="<?php echo e(route("admin.user-alerts.index")); ?>">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span><?php echo e(trans('cruds.userAlert.title')); ?></span>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_management_access')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span><?php echo e(trans('cruds.clientManagement.title')); ?></span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('country_access')): ?>
                            <li class="<?php echo e(request()->is("admin/countries") || request()->is("admin/countries/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.countries.index")); ?>">
                                    <i class="fa-fw fas fa-flag">

                                    </i>
                                    <span><?php echo e(trans('cruds.country.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_access')): ?>
                            <li class="<?php echo e(request()->is("admin/invoices") || request()->is("admin/invoices/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.invoices.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.invoice.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customer_access')): ?>
                            <li class="<?php echo e(request()->is("admin/customers") || request()->is("admin/customers/*") ? "active" : ""); ?>">
                                <a href="<?php echo e(route("admin.customers.index")); ?>">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span><?php echo e(trans('cruds.customer.title')); ?></span>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('profile_password_edit')): ?>
                    <li class="<?php echo e(request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('profile.password.edit')); ?>">
                            <i class="fa-fw fas fa-key">
                            </i>
                            <?php echo e(trans('global.change_password')); ?>

                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    <?php echo e(trans('global.logout')); ?>

                </a>
            </li>
        </ul>
    </section>
</aside>
<?php /**PATH D:\sl_projects\dev-sl-admin-3133b5cfd61dd554 (3)\resources\views/partials/menu.blade.php ENDPATH**/ ?>