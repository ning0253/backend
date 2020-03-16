@extends('layouts/nav')

@section('css')
{!! ReCaptcha::htmlScriptTagJsApi() !!}
@endsection

@section('content')
<section class="header15 cid-rSTo1Nvqlj mbr-fullscreen mbr-parallax-background" id="header15-3">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(7, 59, 76);"></div>

    <div class="container align-right">
        <div class="row">
            <div class="mbr-white col-lg-8 col-md-7 content-container">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    INTRO WITH FORM
                </h1>
                <p class="mbr-text pb-3 mbr-fonts-style display-5">
                    Click any text to edit or style it. Select text to insert a link. Click blue "Gear" icon in the top
                    right corner to hide/show text, title and change the block or form background. Click red "+" in the
                    bottom right corner to add a new block. Use the top left menu to create new pages, sites and add
                    themes.
                </p>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="form-container">
                    <div class="media-container-column" data-form-type="formoid">
                        <!---Formbuilder Form--->
                        <form action="/contact_us/store" method="POST" class="mbr-form form-with-styler"
                            data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true"
                                value="QC1tSQjMQsU9te4GVItZbNbllsIx03z7NDsOKE3O44JtwBLPECUfNMILYpLU2ZpLuUguLOYVSTID7HyxvX4KFmsJOzXp7FaMOlyu4rbDUO7bolJDINJQYaqSPqn1BpAN">
                            @csrf
                            <div class="row">
                                <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for
                                    filling out the form!</div>
                                <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                                </div>
                            </div>
                            <div class="dragArea row">
                                <div class="col-md-12 form-group " data-for="name">
                                    <input type="text" name="name" placeholder="Name" data-form-field="Name"
                                        required="required" class="form-control px-3 display-7" id="name-header15-3">
                                </div>
                                <div class="col-md-12 form-group " data-for="email">
                                    <input type="email" name="email" placeholder="Email" data-form-field="Email"
                                        required="required" class="form-control px-3 display-7" id="email-header15-3">
                                </div>
                                <div data-for="phone" class="col-md-12 form-group ">
                                    <input type="tel" name="phone" placeholder="Phone" data-form-field="Phone"
                                        class="form-control px-3 display-7" id="phone-header15-3">
                                </div>
                                <div data-for="message" class="col-md-12 form-group ">
                                    <textarea name="message" placeholder="Message" data-form-field="Message"
                                        class="form-control px-3 display-7" id="message-header15-3"></textarea>
                                </div>
                                {{-- <div data-for="message" class="col-md-12 form-group ">
                                    {!! htmlFormSnippet() !!}

                                    @error('g-recaptcha-response')
                                    <span class="alert alert-danger">
                                        <strong>驗證錯誤</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                <div class="col-md-12 input-group-btn">
                                    <button type="submit" class="btn btn-secondary btn-form display-4">SEND
                                        FORM</button>
                                </div>
                            </div>
                        </form>
                        <!---Formbuilder Form--->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>
@endsection
