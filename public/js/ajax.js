// kiểm tra đăng nhập
function checklogin() {
    $("#btn_login").click(function() {
        $user_email = $("#user_email").val();
        $user_pass = $("#user_pass").val();
        $.post("/ajax/checklogin", {
            email: $user_email,
            pass: $user_pass
        }, function(data) {
                if(data == "user"){
                    $(location).attr('href', 'https://phongtro247.xyz');
                }else if(data == "admin"){
                    $(location).attr('href', 'https://phongtro247.xyz/admin');
                }else if(data == "vendor"){
                    $(location).attr('href', 'https://phongtro247.xyz/vendor');
                }else{
                    alert("Tài khoản hoặc mật khẩu không chính xác");
                }
        });
    });
}
window.onload = checklogin();
function logOutUser() {
    $("#logOutUser").click(function() {
        $.post("/ajax/logout", function(data) {
                if(data == "true"){
                    location.reload();
                }else{
                    alert("Vui lòng thử lại");
                }
        });
    });
}
window.onload = logOutUser();
// đăng ký tài khoản
function register() {
    $("#btn_regis").click(function() {
        $action = true;
        $birthday = $("#regis_bdyear").val() + "-" + $("#regis_bdd").val() + "-" + $("#regis_bdday").val();
        $pass = $("#regis_pass").val();
        $passa = $("#regis_passa").val();
        $gender = "";
        for ($i = 0; $i < 3; $i++) {
            if ($(':radio')[$i].checked) {
                if ($i === 0) {
                    $gender = "Nữ";
                }
                if ($i == 1) {
                    $gender = "Nam";
                }
                if ($i == 2) {
                    $gender = "Khác";
                }
            }
        }
        if (!checkNull([$("#first_name").val(), $("#first_name").val(), $("#first_name").val(), $("#regis_email").val(), $("#regis_pass").val(), $gender])) {
            $action = false;
        }
        if ($pass != $passa) {
            $action = false;
        }
        if(!checkemail($("#regis_email").val())){
            $action = false;
        }
        $json_regis = {
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            email: $("#regis_email").val(),
            pass: $("#regis_pass").val(),
            birthday: $birthday,
            gender: $gender
        }
        if($action){
            $.post("/ajax/checkregis", {json_regis: $json_regis}, 
            function(data){
                if(data == "true"){
                    $conf = confirm("Đăng ký thành công đăng nhập ngay");
                    if($conf){
                        $user_email = $("#regis_email").val();
                        $user_pass = $("#regis_pass").val();
                        $.post("./ajax/checklogin", {
                            email: $user_email,
                            pass: $user_pass
                        }, function(data) {
                            if(data == "user"){
                                $(location).attr('href', 'https://phongtro247.xyz')
                            }else{
                                alert("Tài khoản hoặc mật khẩu không chính xác");
                            }
                                
                        });
                    }
                }else{
                    alert(data);
                }
            });
            
        }
    });
}
window.onload = register();

$("#likeRoom").click(function(){
    $url = $(location).attr('href');
    $lUrl = $url.lastIndexOf("/");
    $room_id = $url.substr($lUrl + 1, $url.length - 1);
    $room_id = Number($room_id);
    $.post("/ajax/likeroom", {
            room_id: $room_id
        }, function(data) {
            if(data){
                if(data == "login"){
                    $login = confirm("Vui lòng đăng nhập để thực hiện hành động");
                    if($login){
                        $(location).attr('href', 'https://phongtro247.xyz/login');
                    }
                }else{
                    $json = JSON.parse(data);
                    $("#countLikeRoom").html($json.count);
                    if($json.action == "add"){
                        $("#likeRoom svg").addClass("text-danger");
                    }
                    if($json.action == "remove"){
                        $("#likeRoom svg").removeClass("text-danger");
                    }
                }
                
            }else{
                alert("Không thể thực hiện hành động");
            }
        });
});
// bình luận phòng trọ
$("#btnSubCmt").click(function (){
    $cls = $("#boxCmt").attr("class"); 
    $content = $("#boxCmt").val();
    $start = $cls.lastIndexOf("_") + 1;
    $end = $cls.length;
    $id_room = $cls.slice($start, $end);
    if($content === ""){
        alert("Không được để trống");
    }else{
        $.post("/ajax/cmtroom", {
            room_id: $id_room,
            content: $content
        }, function(data){
            if(data == "login"){
                $login = confirm("Vui lòng đăng nhập để thực hiện hành động");
                if($login){
                    $(location).attr('href', 'https://phongtro247.xyz/login');
                }
            }else{
                $json = JSON.parse(data);
                console.log($json);
                if($json.id !== "false"){
                    if($json.time <= 300){
                        $time = 300 - $json.time;
                        alert("Vui lòng đợi " + $time + "s");
                    }else{
                        $.post("/phongtro/roomcomment/"+$id_room+"/"+$json.id, function(value){
                            $("#listCmtRoom").prepend(value);
                            $("#boxCmt").val("");
                        });
                    }
                }else{
                    alert("Không thể thực hiện hành động");
                }
                
                
            }
            
            
        })
    }
});
// add vote
$("#btnVote").click(function(){
    $cls = $("#boxCmt").attr("class");
    $start = $cls.lastIndexOf("_") + 1;
    $end = $cls.length;
    $id_room = $cls.slice($start, $end);
    $.post("/ajax/voteroom", {
            room_id: $id_room,
            vote: $vote
        }, function(data){
            if(data == "login"){
                $login = confirm("Vui lòng đăng nhập để thực hiện hành động");
                if($login){
                    $(location).attr('href', 'https://phongtro247.xyz/login');
                }
            }else{
                $json = JSON.parse(data);
                console.log($json);
                if($json.id !== "false"){
                    $.post("/phongtro/RoomVote/"+$id_room+"/"+$json.id, function(value){
                        $("#fontVote").html(value);
                    });
                    console.log($json);
                }else{
                    alert("Không thể thực hiện hành động");
                }
                
                
            }
        })
})
// trả lời commnet
function repCmt(idCmt){
    $idContent = "#box_repCmt" + idCmt;
    $idBoxRepCmt = "#BoxRepCmt" + idCmt;
    $content = $($idContent).val();
    if($content == ""){
        alert("Không được để trống");
    }else{
        $.post("/ajax/repCmt", {
            cmt_id: idCmt,
            content: $content
        }, function(data){
            if(data == "login"){
                $login = confirm("Vui lòng đăng nhập để thực hiện hành động");
                if($login){
                    $(location).attr('href', 'https://phongtro247.xyz/login');
                }
            }else{
                $json = JSON.parse(data);
                console.log($json);
                if($json.id !== "false"){
                    $.post("/phongtro/repCmt/"+$json.id, function(value){
                        $($idBoxRepCmt).prepend(value);
                    });
                    $($idContent).val("");
                    console.log($json);
                }else{
                    alert("Không thể thực hiện hành động");
                }
                
                
            }
        })
    }
}
// khòa tài khoản
function actAccount(user_id, action){
    $.post("ajax/actAccount",{user_id:user_id, action:action}, function(data){
        if(data != "false"){
            $id_act = "#user_status_" + user_id;
            $id_row = "#row_" + user_id;
            $($id_act).attr("onclick");
            if(data == "ban"){
                $($id_act).attr("onclick", "actAccount(" + user_id +", 'active')");
                $($id_act).text("Kích hoạt");
            }
            if(data == "active"){
                $($id_act).attr("onclick", "actAccount(" + user_id +", 'ban')");
                $($id_act).text("Khóa");
            }
            $($id_row).toggleClass("table-danger");
            alert(data + " thành công");
        }else{
            alert("không thể thực hiên hành động");
        }
    });
}
// đặt lại mật khẩu
function resetPass(user_id){
    $.post("ajax/resetPass",{user_id : user_id}, function(data){
        if(data == "true"){
            alert("Mật khẩu đã đưa về mặc định 123456");
        }else{
            alert("Không thể thực hiện hành động");
        }
    })
}
// hủy quyền/ cấp quyền
function actPower(user_id, action, pages){
    $.post("ajax/actPower", {
        user_id : user_id,
        action : action
        }, function(data){
            if(data == "true"){
                alert("Cấp quyền thành công");
                $page = pages + "Account";
                getDataAccount($page);
            }else{
                alert("Không thể thực hiện hành động");
            }
        })
}
function getDataAcc(fileName, status){
   $.post("/ajax/adminAccount",{
        id: fileName,
        status : status
    },
        function (data) {
            $("#dataAdmin").html(data);
            $oclAll = "getDataAcc('" + fileName + "', " + 2 +")";
            $oclActive = "getDataAcc('" + fileName + "', " + 1 +")";
            $oclBan = "getDataAcc('" + fileName + "', " + 0 +")";
            $("#allAcc").attr("onclick", $oclAll);
            $("#AccActive").attr("onclick", $oclActive);
            $("#AccBan").attr("onclick", $oclBan);
        }
    ); 
}
//xử lý phòng trọ
function actRoom(id_room, action, status, AddTime = 0){
    $.post("/ajax/actRoom", {id_room : id_room, action : action, AddTime : AddTime}, function(data){
        if(data == "true"){
            alert(action + " Thành công");
            getDataRoom(status);
        }else{
            alert("Không thể thực hiện hành động" + data);
        }
    })
}
// 
function getDataRoomStatus(action){
    $.post("/ajax/getRoomStatus",{action : action},
        function (data) {
            $("#dataAdmin").html(data);
            $("#allRoom").attr("onclick", "getDataRoom(1)");
            $("#activeRoom").attr("onclick", "getDataRoomStatus('active')");
            $("#TimeoutRoom").attr("onclick", "getDataRoomStatus('time')");
            $("#waitingRoom").attr("onclick", "getDataRoomStatus('waiting')");
        }
    );
}
// tìm kiếm
function searchRoomVendor(){
    $("#boxSearchVendor").keyup(function(){
        $keyW = $(this).val();
        $.post("ajax/searchRoomVendor", {keyW : $keyW}, function(data){
            $("#listRoomVendor").html(data);
        })
    });
}
$(window).onload = searchRoomVendor();
function actRoomVendor(action){
    $.post("ajax/actRoomVendor", {action : action}, function(data){
        $("#listRoomVendor").html(data);
    })
}
$("#allRoomV").click(function(){
    actRoomVendor("all");
})
$("#activeRoomV").click(function(){
    actRoomVendor("active");
})
$("#TimeoutRoomV").click(function(){
    actRoomVendor("timeout");
})
$("#waitingRoomV").click(function(){
    actRoomVendor("waiting");
})
$("#overRoomV").click(function(){
    actRoomVendor("over");
})
// lấy quận/huyện xã/phường
$("#postProvinc").change(function(){
    $code = $("#postProvinc").val();
    $.post("/ajax/getDistrictPost", {code : $code}, function(data){
        $json = JSON.parse(data);
        $s = "<option selected>Quận/Huyện</option>";
        for($i = 0; $i < $json.length; $i++){
            $s += '<option value="' + $json[$i].code + '">'+ $json[$i].name +'</option>';
        }
        $("#postDistrict").html($s);
    })
})
$("#postDistrict").change(function(){
    $code = $("#postDistrict").val();
    $.post("/ajax/getwardPost", {code : $code}, function(data){
        $json = JSON.parse(data);
        $s = "<option selected>Phường/Xã</option>";
        for($i = 0; $i < $json.length; $i++){
            $s += '<option value="' + $json[$i].code + '">'+ $json[$i].name +'</option>';
        }
        $("#postWard").html($s);
    })
});
// Đăng bài
$("#btnPost").click(function(){
    $data = new Array();
    $files = $("#postImage")[0].files;
    $fileName = new Array();
    for($i = 0; $i < $files.length; $i++) {
        $file = $files[$i];
        $fileName[$i] = $file.name;
    }
    $data = {
   RoomName : $("#RoomName").val(),
   postProvinc : $("#postProvinc").val(),
   postDistrict : $("#postDistrict").val(),
   postWard : $("#postWard").val(),
   postApart : $("#postApart").val(),
   postPrice : $("#postPrice").val(),
   postElect : $("#postElect").val(),
   postWater : $("#postWater").val(),
   postCategory : $("#postCategory").val(),
   postCount : $("#postCount").val(),
   postAreage : $("#postAreage").val(),
   postDetail : $("#postDetail").val(),
   postClosed : $("#postClosed").val(),
   postAirCo : $("#postAirCo").val(),
   postHeater : $("#postHeater").val(),
   postFridge : $("#postFridge").val(),
   postWM : $("#postWM").val(),
   postBed : $("#postBed").val(),
   postWardrobe : $("#postWardrobe").val(),
   postNearHost : $("#postNearHost").val(),
   postTime : $("#postTime").val(),
   postImage : $fileName,
   postNote : $("#postNote").val(),
  post_posts : $editor.getData(),
  postTimeend : $("#postTimeend").val(),
  ipImage : $files
  };
  $data = JSON.stringify($data);
  $.post("/ajax/addDataRoom", {data : $data}, function(data){
  })
});
$("#btnSearch").click(function(){
    window.location.href = 'timkiem/timphong/' + $("#postProvinc").val() + "/" + $("#postDistrict").val() + "/" + $("#postWard").val() + "/" + $("#price").val() + "/" + $("#acreage").val();
})
// update account
// $("#btnResetPass").click(function(){
//     if($("#ipPassNew1").val() == $("#ipPassNew2").val()){
//         $.post("/ajax/rePass", {
//             ipPassOld : $("#ipPassOld").val(),
//             ipPassNew1 : $("#ipPassNew2").val()
//         },function(data){
//             alert(data);
//         })
//     }
    
// })