{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Suppliers" icon="la la-industry" :link="backpack_url('supplier')" />
<x-backpack::menu-item title="Categories" icon="la la-icons" :link="backpack_url('category')" />
<x-backpack::menu-item title="Products" icon="la la-layer-group" :link="backpack_url('product')" />
<x-backpack::menu-item title="Warehouses" icon="la la-warehouse" :link="backpack_url('warehouse')" />