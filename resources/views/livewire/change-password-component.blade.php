<div>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow" wire:navigate>Home</a>               
                <span></span> My Account
                <span></span> Reset Password
            </div>
        </div>
    </div>
    <section class="pt-30 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <x-dashboard-menu></x-dashboard-menu>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Reset Password</h5>
                                        </div>
                                        <div class="card-body">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif 
                                            <form wire:submit="save">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square @if($errors->has('current_password')) is-invalid @endif" type="password" wire:model="form.current_password">
                                                        @if ($errors->has('current_password'))
                                                            @foreach ($errors->get('current_password') as $message)
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" type="password" wire:model="form.password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input required="" class="form-control square" type="password" wire:model="form.password_confirmation">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">
                                                            <span wire:loading.remove wire:target="save">Save</span>
                                                            <span wire:loading wire:target="save">&#8987; Saving...</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
