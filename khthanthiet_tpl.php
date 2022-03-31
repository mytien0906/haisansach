<style>
    .khtt-wrapper {
        font-family: 'Roboto';
    }

    .khtt-title {
        font-size: 36px;
        line-height: 40px;
        padding: 32px 0px 0px;
        text-align: center;
    }

    .khtt-form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .khtt-form-group {
        margin-top: 10px;
        margin-bottom: 15px;
    }

    .khtt-form-group.error .khtt-input {
        border-color: #f44336;
    }

    .khtt-form-group.error .khtt-label {
        color: #f44336;
    }

    .khtt-form-group.error .khtt-error {
        visibility: visible;
    }

    .khtt-form-content {
        width: 500px;
        position: relative;
    }

    .khtt-input {
        width: 100%;
        font-size: 1.05em;
        border: 2px solid #e5e7eb;
        border-radius: 5px;
        padding: 15px;
        transition: .4s;
    }

    .khtt-input.radio {
        width: auto;
    }

    .khtt-input:focus,
    .khtt-input:hover {
        outline: none;
        border-color: #0E1C47;
    }

    .khtt-input:focus~.khtt-label,
    .khtt-label.active {
        font-size: .8em;
        top: 0;
        left: 10px;
    }

    .khtt-label {
        color: #757575;
        background-color: #fff;
        position: absolute;
        font-size: 1em;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        padding: 2px 5px;
        transition: .4s;
    }

    span.khtt-label {
        position: initial;
        padding: 0;
    }

    .khtt-error {
        color: #f44336;
        display: block;
        margin-top: 10px;
        margin-left: 15px;
        visibility: hidden;
        transition: .4s;
    }
</style>

<div class="khtt-wrapper">
    <h2 class="khtt-title"> Hãy là một thành viên của Hải Sản Hoàng Gia ngay hôm nay.</h2>
    <form class="khtt-form" novalidate method="post" action="account/dang-ky" enctype="multipart/form-data">
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <input class="khtt-input" type="text" placeholder="Họ" required>
                <label class="khtt-label">Họ *</label>
            </div>
            <small class="khtt-error">Họ là bắt buộc</small>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <input class="khtt-input" type="text" placeholder="Tên" required>
                <label class="khtt-label">Tên *</label>
            </div>
            <small class="khtt-error">Tên là bắt buộc</small>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <input class="khtt-input" type="text" placeholder="Số điện thoại" required>
                <label class="khtt-label">Số điện thoại *</label>
            </div>
            <small class="khtt-error">Số điện thoại là bắt buộc</small>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <input class="khtt-input" type="text" placeholder="Email" required>
                <label class="khtt-label">Email *</label>
            </div>
            <small class="khtt-error">Email là bắt buộc</small>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <input class="khtt-input" type="password" placeholder="Mật khẩu" required>
                <label class="khtt-label">Mật khẩu *</label>
            </div>
            <small class="khtt-error">Mật khẩu là bắt buộc</small>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <input class="khtt-input" type="password" placeholder="Xác nhận mật khẩu" required>
                <label class="khtt-label">Xác nhận mật khẩu *</label>
            </div>
            <small class="khtt-error">Xác nhận mật khẩu là bắt buộc</small>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <input class="khtt-input" type="datetime" placeholder="Ngày sinh">
                <label class="khtt-label">Ngày sinh</label>
            </div>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <span class="khtt-label">Giới tính</span>
                <div style="margin-top: 15px;">
                    <input class="khtt-input radio" name="gender" type="radio"> Nam
                    <input class="khtt-input radio" name="gender" type="radio"> Nữ
                </div>
            </div>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <select class="khtt-input">
                    <option></option>
                    <option value="1">HCM</option>
                    <option value="2">HN</option>
                </select>
                <label class="khtt-label">Tỉnh/Thành phố</label>
            </div>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <select class="khtt-input">
                    <option></option>
                    <option value="1">HCM</option>
                    <option value="2">HN</option>
                </select>
                <label class="khtt-label">Quận/Huyện</label>
            </div>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <select class="khtt-input">
                    <option></option>
                    <option value="1">HCM</option>
                    <option value="2">HN</option>
                </select>
                <label class="khtt-label">Phường/Xã</label>
            </div>
        </div>
        <div class="khtt-form-group">
            <div class="khtt-form-content">
                <input class="khtt-input" type="password" placeholder="Địa chỉ">
                <label class="khtt-label">Địa chỉ</label>
            </div>
        </div>

        <div class="khtt-text">
            (*)Thông tin cần thiết<br/>
            Bạn sẽ nhận được phần thưởng đặc biệt nếu bạn đăng ký với thông tin đầy đủ.
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.khtt-input').focus(function() {
            $(this).parent().find('.khtt-label').addClass('active');
        });
        $('.khtt-input').blur(function() {
            if ($(this).val() === '') {
                $(this).parent().find('.khtt-label').removeClass('active');
            }
        });
        $('select.khtt-input').blur(function() {
            if ($(this).find(':selected').val() === '') {
                $(this).removeClass('active');
            }
        });
        $('.khtt-input[required]').focus(function() {
            $(this).parent().parent().addClass('error');
        });
        $('.khtt-input[required]').blur(function() {
            if ($(this).val() !== '') {
                $(this).parent().parent().removeClass('error');
            }
        });
        $('.khtt-label').click(function() {
            $(this).parent().find('.khtt-input').focus();
        });
    });
</script>