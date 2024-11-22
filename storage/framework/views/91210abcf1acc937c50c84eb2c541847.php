<nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="bx bx-menu bx-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search bx-md"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none ps-1 ps-sm-2"
                    placeholder="Search..."
                    aria-label="Search..." />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-4">
                  <a
                    class="btn btn-outline-primary"
                    href="<?php echo e(route('home')); ?>"
                    target="_blank"
                    ><i class="bx bx-link-alt"></i> Browse Website</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="<?php echo e(auth()->user()->profile_photo_url); ?>" alt="<?php echo e(auth()->user()->name); ?>" class="rounded-full object-cover">
                      
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item <?php echo e(request()->routeIs('profile.show') ? 'active' : ''); ?>" href="<?php echo e(route('profile.show')); ?>" >
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                                <img src="<?php echo e(auth()->user()->profile_photo_url); ?>" alt="<?php echo e(auth()->user()->name); ?>" class="rounded-full object-cover">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0">John Doe</h6>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item <?php echo e(request()->routeIs('profile.show') ? 'active' : ''); ?>" href="<?php echo e(route('profile.show')); ?>" >
                        <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"> <i class="bx bx-cog bx-md me-3"></i><span>Settings</span> </a>
                    </li>
                    
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                        @click.prevent="$root.submit();">
                                <?php echo csrf_field(); ?>
                            <i class="bx bx-power-off bx-md me-3"></i>
                            <span><?php echo e(__('Log Out')); ?></span>
                            </a>
                        </form>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/admin/layouts/navbar.blade.php ENDPATH**/ ?>