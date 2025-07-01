

@if (session('productAdded'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('productAdded') }}
    </div>
@endif
@if (session('AccessError'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('AccessError') }}
    </div>
@endif
@if (session('cartUpdated'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('cartUpdated') }}
    </div>
@endif
@if (session('deliveryStatus'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('deliveryStatus') }}
    </div>
@endif
@if (session('OrderReturned'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('OrderReturned') }}
    </div>
@endif
@if (session('OrderCancelled'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('OrderCancelled') }}
    </div>
@endif


@if (session('quantityUpdated'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('quantityUpdated') }}
    </div>
@endif
@if (session('noCheckoutAccess'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('noCheckoutAccess') }}
    </div>
@endif
@if (session('EmptyCart'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('EmptyCart') }}
    </div>
@endif

@if (session('productDelted'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('productDelted') }}
    </div>
@endif
@if (session('categoryAdded'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('categoryAdded') }}
    </div>
@endif
@if (session('CategoryDelted'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('CategoryDelted') }}
    </div>
@endif
@if (session('AdminError'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('AdminError') }}
    </div>
@endif
@if (session('noProduct'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('noProduct') }}
    </div>
@endif
@if (session('logoutMessage'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('logoutMessage') }}
    </div>
@endif
@if (session('Error'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('Error') }}
    </div>
@endif
@if (session('accessError'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('accessError') }}
    </div>
@endif
@if (session('deniedUserAcess'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('deniedUserAcess') }}
    </div>
@endif
@if (session('deniedAdminAcess'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('deniedAdminAcess') }}
    </div>
@endif
@if (session('cartError'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('cartError') }}
    </div>
@endif
@if (session('emptyCart'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('emptyCart') }}
    </div>
@endif
@if (session('UserError'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('UserError') }}
    </div>
@endif
@if (session('welcomeAdmin'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('welcomeAdmin') }}
    </div>
@endif
@if (session('submitMessage'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('submitMessage') }}
    </div>
@endif
@if (session('userError'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('userError') }}
    </div>
@endif
@if (session('welcomeUser'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('welcomeUser') }}
    </div>
@endif
@if (session('UserRegistered'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('UserRegistered') }}
    </div>
@endif
@if (session('productUpdated'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('productUpdated') }}
    </div>
@endif
@if (session('CategoryUpdate'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('CategoryUpdate') }}
    </div>
@endif