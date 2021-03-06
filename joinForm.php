<?php
session_start();
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <script src = "//code.jquery.com/jquery-2.2.4.min.js" ></script>
    <link href="css/reset5.css" rel="stylesheet" type="text/css">
    <link href="css/front.css" rel="stylesheet" type="text/css">
    <link href="css/joinForm.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript" src="scripts/joinForm.js"></script>
<body>
<div id="wrap">
    <?php include ("header.php") ?>
    <form name="joinForm" action="joinSubmit.php" method="POST">
        <fieldset>
            <p class="register_tit"><span>회원가입</span></p>
            <p class="register_cap">* 는 필수 입력 사항입니다.</p>

            <div class="register_essential">
                <div class="register_li">
                    <div class="i_tit"><strong>아이디<span>* </span></strong></div>
                    <div class="i_con">
                        <label class="i_label">
                            <input type="text" name="i_id" id="i_id" class="i_id" placeholder=" 4글자 이상 입력하세요." onfocus="delete_shadow(this)" onblur="show_shadow(this)" >
                        </label>
                        <label>
                            <input type="button" name="i_button" value="아이디중복확인" id="m_chk" onclick="idDuplicate_check()" class="i_button" >&nbsp;<span id="id_tip" class="f_red"></span>
                        </label>
                    </div>
                </div>

                <div class="register_li">
                    <div class="i_tit"><strong>비밀번호<span>* </span></strong></div>
                    <div class="i_con">
                        <label class="i_label">
                            <input type="password" name="i_pass" id="i_pass" class="i_text" placeholder="********" onfocus="delete_shadow(this)" onblur="show_shadow(this);">
                            <span id="pw_tip">8~20자리의 영문, 숫자 조합(영문, 숫자, 특수 기호 조합을 권장합니다)</span>
                        </label>
                    </div>
                </div>
                <div class="register_li">
                    <div class="i_tit">비밀번호 확인<span>* </span></></div>
                <div class="i_con">
                    <label class="i_label">
                        <input type="password" name="i_pass_chk" id="i_pass_chk" class="i_text" placeholder="********" onfocus="delete_shadow(this)" onblur="show_shadow(this);">
                        <span id="pwchk_tip"></span><span id="pw_same_tip" class="f_red"></span>
                    </label>
                </div>
            </div>

            <div class="register_li">
                <div class="i_tit"><strong>이름<span>* </span></strong></div>
                <div class="i_con">
                    <label>
                        <input type="text" name="i_name" id="i_name" value="" class="i_text">
                    </label>
                </div>
            </div>

            <div class="register_li">
                <div class="i_tit"><strong>성별<span>* </span></strong></div>
                <div class="i_con">
                    <label class="ra_label">
                        <input type="radio" name="i_sex" id="i_sex" value="남자" class="i_radio" checked="";">
                        <span>남성</span>
                    </label>
                    <label class="ra_label">
                        <input type="radio" name="i_sex" id="i_sex" value="여자" class="i_radio" ;">
                        <span>여성</span>
                    </label>
                </div>
            </div>

            <div class="register_li">
                <div class="i_tit"><strong>생년월일</strong></div>
                <div class="i_con">
                    <label>
                        <select id="i_birth_year" name="i_birth_year" class="i_select">
                            <option value="">::선택::</option>
                            <?php
                            for($year=1911;$year<2016;$year++)
                                echo "<option \"value\"=$year>$year</option>";
                            ?>
                        </select>
                    </label>
                    <label>
                        <select id="i_birth_month" name="i_birth_month" class="i_select">
                            <option value="">::선택::</option>
                            <?php
                            for($month=1;$month<13;$month++)
                                printf("<option \"value\"=%02d>%02d</option>",$month,$month);
                            ?>
                        </select>
                    </label>
                    <label>
                        <select id="i_birth_day" name="i_birth_day" class="i_select">
                            <option value="">::선택::</option>   <?php
                            for($day=1;$day<32;$day++)
                                printf("<option \"value\"=%02d>%02d</option>",$day,$day);
                            ?>

                        </select>
                    </label>

                    <label class="ra_label">
                        <input type="radio" name="i_birth_type" id="i_birth_type_s" value="양력" class="i_radio" checked="">
                        <span>양력</span>
                        <input type="radio" name="i_birth_type" id="i_birth_type_l" value="음력" class="i_radio">
                        <span>음력</span>
                    </label>
                </div>
            </div>
            <div class="register_li">
                <div class="i_tit"><strong>이메일<span>* </span></strong></div>
                <div class="i_con">
                    <input type="hidden" name="i_email" id="i_email" value="">
                    <label>
                        <input type="text" name="i_email_1" id="i_email_1" class="i_text2" value="">
                    </label>
                    @
                    <label>
                        <input type="text" name="i_email_2" id="i_email_2" class="i_text2" value="">
                    </label>
                    <label>
                        <select id="i_email_addr" name="i_email_addr" onchange="get_select_data(this.selectedIndex)" class="i_select2">
                            <option value="">직접입력</option>
                            <?php
                            $adr=array("naver.com","daum.net","nate.com","gmail.com","hotmail.com","yahoo.com");
                            for($i=0;$i<sizeof($adr);$i++)
                                echo "<option value=\"$adr[$i]\">$adr[$i]</option>"
                            ?>
                        </select>
                        <span id="email_tip" color="red"></span>
                    </label>


                </div>
            </div>

            <div class="register_li">
                <div class="i_tit"><strong>휴대전화</strong></div>
                <div class="i_con">
                    <label>
                        <select name="i_mobile_1" id="i_mobile_1" class="i_text3">
                            <option value="010">010</option>
                            <option value="011">011</option>
                            <option value="017">017</option>
                            <option value="019">019</option>
                        </select>
                    </label>
                    -
                    <label>
                        <input type="text" name="i_mobile_2" id="i_mobile_2" class="i_text3" value="" maxlength="4">
                    </label>
                    -
                    <label>
                        <input type="text" name="i_mobile_3" id="i_mobile_3" class="i_text3" value="" maxlength="4">
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="btn_label_default">
            <label>
                <button name="mem_proc_btn" type="button" class="btn_blue" onclick="joinFormCheck()">회원가입하기</button>
            </label>
        </div>
</div>
</form>

<script>
    $("button[name='mem_proc_btn']").on('click', function(){
        var checkId = $("#i_id").val();
//        console.log(checkId);
        var i_id = $("#i_id").val();
//        console.log(i_id);
        var i_pass= $("#i_pass").val();
//        console.log(i_pass);
        var i_name= $("#i_name").val();
//        console.log(i_name);
        var i_sex= $("#i_sex").val();
//        console.log(i_sex);
        var i_birth_year= $("#i_birth_year option:selected").val();
//        console.log(i_birth_year);
        var i_birth_month= $("#i_birth_month option:selected").val();
//        console.log(i_birth_month);
        var i_birth_day= $("#i_birth_day option:selected").val();
//        console.log(i_birth_day);
        var i_birth_type= $("input[name = 'i_birth_type']:checked").val();
//        console.log(i_birth_type);
        var i_email_1= $("#i_email_1").val();
//        console.log(i_email_1);
        var i_email_2= $("#i_email_2").val();
//        console.log(i_email_2);
        var i_mobile_1= $("#i_mobile_1 option:selected").val();
//        console.log(i_mobile_1);
        var i_mobile_2= $("#i_mobile_2").val();
//        console.log(i_mobile_2);
        var i_mobile_3= $("#i_mobile_3").val();
//        console.log(i_mobile_3);

        $.ajax({
            url : 'submitJoin.php',
            dataType : 'json',
            type : 'post',
            data : {
                checkId: checkId,
                i_id:i_id,
                i_pass:i_pass,
                i_name:i_name,
                i_sex:i_sex,
                i_birth_year:i_birth_year,
                i_birth_month:i_birth_month,
                i_birth_day:i_birth_day,
                i_birth_type:i_birth_type,
                i_email1:i_email_1,
                i_email2:i_email_2,
                i_mobile_1:i_mobile_1,
                i_mobile_2:i_mobile_2,
                i_mobile_3:i_mobile_3
            },
            success : function(data){
                console.log(data);
                if(data) {
                    alert("가입이 완료되었습니다.");
                    location.href="index.php";
                }
                else
                    alert("동일한 아이디 존재");
            }
        });
    })
</script>
</body>
</html>
