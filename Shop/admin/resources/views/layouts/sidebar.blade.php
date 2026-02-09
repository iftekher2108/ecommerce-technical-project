<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="/" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('backend/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">{{ config('app.name') }}</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->

    @php
        $navMenus = [
            [
                'title' => 'Dashboard',
                'icon' => 'bi bi-speedometer',
                'route' => 'admin.dashboard',
                'active' => ['admin.dashboard'],
                'permission' => 'dashboard-index',
            ],
            [
                'title' => 'Catalog',
                'icon' => 'bi bi-box-seam',
                'children' => [
                    [
                        'title' => 'Product',
                        'icon' => null,
                        'route' => 'admin.product.index',
                        'url' => '',
                        'active' => ['admin.product.*'],
                        'permission' => 'product-index',
                    ],
                    [
                        'title' => 'Category',
                        'icon' => null,
                        'route' => 'admin.category.index',
                        'url' => '',
                        'active' => ['admin.category.*'],
                        'permission' => 'category-index',
                    ],
                    [
                        'title' => 'Brand',
                        'icon' => null,
                        'route' => 'admin.brand.index',
                        'url' => '',
                        'active' => ['admin.brands.*'],
                        'permission' => 'brand-index',
                    ],
                ],
            ],
            [
                'title' => 'User Management',
                'icon' => 'bi bi-person-bounding-box',
                'children' => [
                    [
                        'title' => 'User',
                        'icon' => null,
                        'route' => 'admin.user.index',
                        'url' => '',
                        'active' => ['admin.user.*'],
                        'permission' => 'user-index',
                    ],
                    [
                        'title' => 'Role',
                        'icon' => null,
                        'route' => 'admin.role.index',
                        'url' => '',
                        'active' => ['admin.role.*'],
                        'permission' => 'role-index',
                    ],
                    [
                        'title' => 'Permission',
                        'icon' => null,
                        'route' => 'admin.permission.index',
                        'url' => '',
                        'active' => ['admin.permission.*'],
                        'permission' => 'permission-index',
                    ],
                ],
            ],
        ];

        $resolveUrl = static function (array $item) {
            if (!empty($item['route']) && \Illuminate\Support\Facades\Route::has($item['route'])) {
                return route($item['route']);
            }

            return $item['url'] ?? '#';
        };

        $isActive = static function (array $patterns, ?string $fallbackRoute = null) {
            foreach ($patterns as $pattern) {
                if (request()->routeIs($pattern)) {
                    return true;
                }
            }

            return $fallbackRoute ? request()->routeIs($fallbackRoute) : false;
        };
    @endphp

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">

                @foreach ($navMenus as $menu)
                    @php
                        $children = $menu['children'] ?? [];
                    @endphp

                    @if (!empty($children))
                        @php
                            $childPermissions = array_values(array_filter(array_map(
                                fn($child) => $child['permission'] ?? null,
                                $children
                            )));

                            $parentIsActive = false;
                            foreach ($children as $child) {
                                if ($isActive($child['active'] ?? [], $child['route'] ?? null)) {
                                    $parentIsActive = true;
                                    break;
                                }
                            }
                        @endphp

                        @canany($childPermissions)
                            <li class="nav-item {{ $parentIsActive ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ $parentIsActive ? 'active' : '' }}">
                                    <i class="nav-icon {{ $menu['icon'] }}"></i>
                                    <p>
                                        {{ $menu['title'] }}
                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    @foreach ($children as $child)
                                        @can($child['permission'])
                                            @php
                                                $childIsActive = $isActive($child['active'] ?? [], $child['route'] ?? null);
                                            @endphp
                                            <li class="nav-item">
                                                <a href="{{ $resolveUrl($child) }}" class="nav-link {{ $childIsActive ? 'active' : '' }}">
                                                    <i class="nav-icon {{ $child['icon'] ?? 'bi bi-arrow-right' }}"></i>
                                                    <p>{{ $child['title'] }}</p>
                                                </a>
                                            </li>
                                        @endcan
                                    @endforeach
                                </ul>
                            </li>
                        @endcanany
                    @elseif (!empty($menu['permission']))
                        @php
                            $singleIsActive = $isActive($menu['active'] ?? [], $menu['route'] ?? null);
                        @endphp
                        @can($menu['permission'])
                            <li class="nav-item">
                                <a href="{{ $resolveUrl($menu) }}" class="nav-link {{ $singleIsActive ? 'active' : '' }}">
                                    <i class="nav-icon {{ $menu['icon'] }}"></i>
                                    <p>{{ $menu['title'] }}</p>
                                </a>
                            </li>
                        @endcan
                    @endif
                @endforeach

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
