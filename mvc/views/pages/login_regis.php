<!-- Modal -->
<div class="modal fade" id="login-regis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mt-1">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <span class="font-weight-bold text-colors text-2">Đăng ký nhanh</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="was-validated">
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="first_name">Họ tên đệm</label>
                            <input type="text" name="first_name" class="form-control is-valid" aria-describedby="validatedInputGroupPrepend" id="first_name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="last_name">Tên</label>
                            <input type="text" name="last_name" class="form-control is-valid" aria-describedby="validatedInputGroupPrepend" id="last_name" required>
                        </div>
                    </div>
                    <div class=" mb-3">
                        <label for="regis_email">Email đăng nhập</label>
                        <input type="email" name="regis_email" class="form-control is-valid" aria-describedby="validatedInputGroupPrepend" id="regis_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="regis_pass">Mật khẩu <span id="regis_denger_length" class="text-danger d-none">- mật khẩu tối thiếu 6 ký tự.</span></label>
                        <input type="password" name="regis_pass" class="form-control is-valid" aria-describedby="validatedInputGroupPrepend" id="regis_pass" required>
                    </div>
                    <div class="mb-3">
                        <label for="regis_passa">Nhập lại mật khẩu <span id="regis_denger" class="text-danger d-none">- xác nhận mật khâu không chính xác.</span></label>
                        <input type="password" name="regis_passa" class="form-control is-valid" aria-describedby="validatedInputGroupPrepend" id="regis_passa" required>
                    </div>
                    <div class="mb-3 form-row">
                        <div class="col-4 col-sm-4 col-md-4">
                            <label for="regis_bdday">Ngày sinh</label>
                            <select class="custom-select is-invalid" name="regis_bdday" id="regis_bdday" aria-describedby="validationServer04Feedback" required>
                                <?php
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                for ($i = 1; $i <= 31; $i++) {
                                    if ($i == date('d')) { ?>
                                        <option selected value="<?php echo $i ?>"><?php echo $i ?></option>

                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <label for="regis_bdd">Tháng</label>
                            <select class="custom-select is-invalid" name="regis_bdd" id="regis_bdd" aria-describedby="validationServer04Feedback" required>
                                <?php
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                for ($i = 1; $i <= 12; $i++) {
                                    if ($i == date('m')) { ?>
                                        <option selected value="<?php echo $i ?>"><?php echo $i ?></option>

                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <label for="regis_bdyear">Năm</label>
                            <input type="text" name="regis_bdyear" value="<?php echo date("Y"); ?>" class="form-control is-valid" aria-describedby="validatedInputGroupPrepend" id="regis_bdyear" required>
                        </div>
                    </div>
                    <label for="">Giới tính</label>
                    <div class="mb-3 form-row ml-0 mr-0 regis_gender">

                        <div class="col-4 col-sm-4 col-md-4 pl-0">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="gender_female" name="regis_gender" required>
                                <label class="custom-control-label" for="gender_female">Nữ</label>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="gender_male" name="regis_gender" required>
                                <label class="custom-control-label" for="gender_male">Nam</label>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 pr-0">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="gender_other" name="regis_gender" required>
                                <label class="custom-control-label" for="gender_other">Khác</label>
                            </div>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customControlValidation1" required checked>
                        <label class="custom-control-label" for="customControlValidation1">Tôi đồng ý với các <a href="#" class="text-decoration-none text-colors">điều khoản</a> của nhà phát hành </label>
                    </div>
                    <div class="w-100 text-center">
                        <input type="button" id="btn_regis" class="btn bg-colorl text-white" value="Đăng ký ngay" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>