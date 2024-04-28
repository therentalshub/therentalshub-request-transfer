
<div class="container">
    <div class="trhtr-type-selector d-flex mb-4">
        <button type="button" class="trhtr-btn trhtr-toggle-type-btn active" data-type="one">One-way transfer</button>
        <button type="button" class="trhtr-btn trhtr-toggle-type-btn" data-type="return">Return transfer</button>
    </div>

    <div class="trhtr-request-form">
    
        <form class="form" method="post" action="" id="trhtr-request-form" autocomplete="off">

            <!--begin:One-way fields-->
            <div class="row mb-3">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="trhrft_arv_date">Date <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_date" id="trhrft_arv_date" placeholder="Select date..." required/>
                </div>
                <div class="col-sm-3 mb-3 mb-sm-0">
                    <label for="trhrft_arv_time">Time <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_time" id="trhrft_arv_time" placeholder="Select time..." required/>
                </div>
                <div class="col-sm-3">
                    <label for="trhrft_arv_pax">Passengers <span class="trhtr-required">*</span></label>
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
                    <label for="trhrft_arv_from">Pick-up location <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_from" id="trhrft_arv_from" placeholder="Pick-up location" required/>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="trhrft_arv_to">Destination <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_to" id="trhrft_arv_to" placeholder="Destination" required/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_arv_flight">Flight number or port info</label>
                    <input type="text" class="trhtr-input-control" name="trhrft_arv_flight" id="trhrft_arv_flight" placeholder="Flight number or port/ship info"/>
                </div>
            </div>
            <!--end:One-way fields-->

            <!--begin:Return fields-->
            <div id="trhtr_dpt_wrap" style="display:none">
                
                <div class="trhtr-separator"></div>

                <div class="row mb-3">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="trhrft_dpt_date">Date <span class="trhtr-required">*</span></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_date" id="trhrft_dpt_date" placeholder="Select date..."/>
                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="trhrft_dpt_time">Time <span class="trhtr-required">*</span></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_time" id="trhrft_dpt_time" placeholder="Select time..."/>
                    </div>
                    <div class="col-sm-3">
                        <label for="trhrft_dpt_pax">Passengers <span class="trhtr-required">*</span></label>
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
                        <label for="trhrft_dpt_from">Pick-up location <span class="trhtr-required">*</span></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_from" id="trhrft_dpt_from" placeholder="Pick-up location"/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="trhrft_dpt_to">Destination <span class="trhtr-required">*</span></label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_to" id="trhrft_dpt_to" placeholder="Destination"/>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="trhrft_dpt_flight">Flight number or port info</label>
                        <input type="text" class="trhtr-input-control" name="trhrft_dpt_flight" id="trhrft_dpt_flight" placeholder="Flight number or port/ship info"/>
                    </div>
                </div>

            </div>
            <!--begin:Return fields-->

            <div class="trhtr-separator"></div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_fname">First name <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_fname" id="trhrft_fname" autocomplete="given-name" required/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_lname">Last name <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_lname" id="trhrft_lname" autocomplete="family-name" required/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_email">Email address <span class="trhtr-required">*</span></label>
                    <input type="text" class="trhtr-input-control" name="trhrft_email" id="trhrft_email" autocomplete="email" required/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_phone">Phone number</label>
                    <input type="text" class="trhtr-input-control" name="trhrft_phone" id="trhrft_phone" autocomplete="tel"/>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="trhrft_notes">Additional notes</label>
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
                        <?=esc_html_e('Thank you! Your request has been submitted. We will contact you shortly with availability. Please check your inbox for our confirmation email.', 'trh');?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="trhtr-button">Submit transfer request</button>
                </div>
            </div>
        </form>

        <script>
            var trhtrApp = {};
        </script>

    </div>
</div>