
<div class="container">
    <div class="trhtr-type-selector d-flex mb-4">
        <button type="button" class="trhtr-btn trhtr-toggle-type-btn active" data-type="one"><?=__('One-way transfer', 'therentalshub-request-transfer');?></button>
        <button type="button" class="trhtr-btn trhtr-toggle-type-btn" data-type="return"><?=__('Return transfer', 'therentalshub-request-transfer');?></button>
    </div>

    <div class="trhtr-request-form">
    
        <form class="form" method="post" action="" id="trhtr-request-form" autocomplete="off">

            <!--begin:One-way fields-->
            <div class="row mb-3">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="trhrft_arv_date"><?=__('Date', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_date" id="trhrft_arv_date" placeholder="<?=__('Select date', 'therentalshub-request-transfer');?>..." required/>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                    <label for="trhrft_arv_time"><?=__('Time', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_time" id="trhrft_arv_time" placeholder="<?=__('Select time', 'therentalshub-request-transfer');?>..." required/>
                </div>
                <div class="col-sm-3">
                    <label for="trhrft_arv_pax"><?=__('Passengers', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                    <select class="trhtr-input-control" name="trhrft_arv_pax" id="trhrft_arv_pax" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="trhrft_arv_from"><?=__('Pick-up location', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_from" id="trhrft_arv_from" placeholder="<?=__('Pick-up location', 'therentalshub-request-transfer');?>" required/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="trhrft_arv_to"><?=__('Destination', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_to" id="trhrft_arv_to" placeholder="<?=__('Destination', 'therentalshub-request-transfer');?>" required/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_arv_flight"><?=__('Flight number or port info', 'therentalshub-request-transfer');?></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_flight" id="trhrft_arv_flight" placeholder="<?=__('Flight number or port/ship info', 'therentalshub-request-transfer');?>"/>
                </div>
            </div>
            <!--end:One-way fields-->

            <!--begin:Return fields-->
            <div id="trhtr_dpt_wrap" style="display:none">
                
                <div class="trhtr-separator"></div>

                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="trhrft_dpt_date"><?=__('Date', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_date" id="trhrft_dpt_date" placeholder="<?=__('Select date', 'therentalshub-request-transfer');?>..."/>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="trhrft_dpt_time"><?=__('Time', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_time" id="trhrft_dpt_time" placeholder="<?=__('Select time', 'therentalshub-request-transfer');?>..."/>
                    </div>
                    <div class="col-sm-3">
                        <label for="trhrft_dpt_pax"><?=__('Passengers', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                        <select class="trhtr-input-control" name="trhrft_dpt_pax" id="trhrft_dpt_pax">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="trhrft_dpt_from"><?=__('Pick-up location', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_from" id="trhrft_dpt_from" placeholder="<?=__('Pick-up location', 'therentalshub-request-transfer');?>"/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="trhrft_dpt_to"><?=__('Destination', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_to" id="trhrft_dpt_to" placeholder="<?=__('Destination', 'therentalshub-request-transfer');?>"/>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="trhrft_dpt_flight"><?=__('Flight number or port info', 'therentalshub-request-transfer');?></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_flight" id="trhrft_dpt_flight" placeholder="<?=__('Flight number or port/ship info', 'therentalshub-request-transfer');?>"/>
                    </div>
                </div>

            </div>
            <!--begin:Return fields-->

            <div class="trhtr-separator"></div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_fname"><?=__('First name', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_fname" id="trhrft_fname" autocomplete="given-name" required/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_lname"><?=__('Last name', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_lname" id="trhrft_lname" autocomplete="family-name" required/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_email"><?=__('Email address', 'therentalshub-request-transfer');?> <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_email" id="trhrft_email" autocomplete="email" required/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_phone"><?=__('Phone number', 'therentalshub-request-transfer');?></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_phone" id="trhrft_phone" autocomplete="tel"/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_notes"><?=__('Additional notes', 'therentalshub-request-transfer');?></label>
                    <textarea class="trhtr-input-control" rows="5" name="trhrft_notes" id="trhrft_notes"></textarea>
                </div>
            </div>

            <div class="row mb-4" id="trhtr-request-failed-alert" role="alert" style="display:none">
                <div class="col">
                    <div class="trhtr-alert trhtr-error-alert"></div>
                </div>
            </div>

            <div class="row mb-4" id="trhtr-request-success-alert" role="alert" style="display:none">
                <div class="col">
                    <div class="trhtr-alert trhtr-success-alert">
                        <?=__('Thank you! Your request has been submitted. We will contact you shortly with availability. Please check your inbox for our confirmation email.', 'therentalshub-request-transfer');?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="trhtr-button"><?=__('Submit transfer request', 'therentalshub-request-transfer');?></button>
                </div>
            </div>
        </form>

        <script>
            var trhtrApp = {};
        </script>

    </div>
</div>