
// check null
function checkNull($check) {
    for ($i = 0; $i < $check.length; $i++) {
        if ($check[$i] === "") {
            return false;
        }
    }
    return true;
}
// check email
function checkemail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
//kiểm tra mật khẩu
function checkpassa() {
    $("#regis_passa").focusout(function() {
        $pass = $("#regis_pass").val();
        $passa = $("#regis_passa").val();
        if ($pass != $passa) {
            $("#regis_denger").removeClass("d-none");
            $("#regis_passa").val("");
        } else {
            $("#regis_denger").addClass("d-none");
        }
    });
}
window.onload = checkpassa();
// kiểm tra độ dài mật khẩu
function checkpass() {
    $("#regis_pass").focusout(function() {
        $pass = $("#regis_pass").val();
        if ($pass.length < 6) {
            $("#regis_denger_length").removeClass("d-none");
            $("#regis_pass").val("");
        } else {
            $("#regis_denger_length").addClass("d-none");
        }
    });
}
window.onload = checkpass();

// owlcarousel
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:5,
    nav:true,
    dots:false,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1,
            nav:true
        }
    }
});
// set chiều cao cho ảnh owlcarousel
$(window).on("load", function(e){
    $height = $(window).width()/4;
    $(".carousel-item img").attr("height", $height);
})
// load box search
$(window).on('load', function(event) {
	$('#box_search_header').css("display", "block");
	$h = $("#box_search_header").height();
	$p = ($h - $("#form_search").height()) / 2;
	$('#box_search_header').css("padding-top", $p);
});
$(window).on("scroll", function(e){
    $scY = window.scrollY;
    $bs = $("#box_search_menu_header");
    $screenWidth = $(window).width();
    if($bs.attr("class") != "text-right py-1 overlay_cust"){
        if($scY > 300 && $screenWidth <= 992){
            $bs.css("display", "block");
        }else{
            $bs.css("display", "none");
        }
    }
    
});
// load url logo header
$(window).on('load', function(event) {
    $screenWidth = $(window).width();
    if($screenWidth >= 500){
        $('#menu_logo_header_img').attr("src", "/public/upload/image/logo_color_white.png");
    }else{
        $('#menu_logo_header_img').attr("src", "/public/upload/image/logo_ico.png");
    }
});
$(".box_search_mobile_header").click(function(){
    $(".search_mobile").addClass("show");
    $("body").css("overflow", "hidden");
});
$(".btn_close_search_mobile").click(function(){
    $(".search_mobile").removeClass("show");
    $("body").css("overflow", "");
});
$(".btn_list_bs_mb").click(function(){
    for($i = 0; $i < $(".btn_list_bs_mb").length; $i++){
        if(this == $(".btn_list_bs_mb")[$i]){
            $count = $i;
        }
    }
    $btn = $(".btn_dk_bs_mb i")[$count];
    if($(this).attr("class") == "navbar p-2 bg-colorl btn_list_bs_mb"){
        $btn.classList.add("fa-chevron-down");
        $btn.classList.remove("fa-chevron-up");
    }else{
        $btn.classList.add("fa-chevron-up");
        $btn.classList.remove("fa-chevron-down");
    }
    
});
$(window).on("load", function(e){
    $("#myTab li:eq(0) a").tab('show');
    $("#tabReview li:eq(0) a").tab('show');
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        $(this).addClass("font-weight-bold");
    });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      $(this).addClass("text-colors");
    });
    $('a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
      $(this).removeClass("font-weight-bold");
    });
});
// show form comment
function show_comment(){
    $("#form_comment").toggleClass("show");
    $("#form_comment").toggleClass("border");
    $("#form_comment").toggleClass("p-2");
}
function rep_cmt(idf){
    $id = "#" + idf;
    $($id).toggleClass("show");
    $($id).toggleClass("border");
    $($id).toggleClass("p-2");
}
$("#btn_comment").click(function(){
    show_comment();
});
// vote phòng trọ
$vote = 5;
$("#formVote .starFas").click(function(){
    for($i = 0; $i < $("#formVote .starFas").length; $i++){
        if($(this)[0] == $("#formVote .starFas")[$i]){
            for($j = $i + 1; $j < $("#formVote .starFas").length; $j++){
                $("#formVote .starFas")[$j].classList.add("d-none");
                $("#formVote .starFar")[$j].classList.remove("d-none");
            }
            $vote = $i + 1;
        }
    }
});
$("#formVote .starFar").click(function(){
    for($i = 0; $i < $("#formVote .starFar").length; $i++){
        if($(this)[0] == $("#formVote .starFar")[$i]){
            for($j = 0; $j < $i + 1; $j++){
                $("#formVote .starFas")[$j].classList.remove("d-none");
                $("#formVote .starFar")[$j].classList.add("d-none");
            }
            $vote = $i + 1;
        }
    }
});
// js xử lý phần admin
// Lấy vị trí của class
function localLi($li, $arr){
    for($i = 0; $i < $arr.length; $i++){
        if($li[0] == $arr[$i]){
            return $i;
        }
    }
    return false;
}
// bỏ active
function removeActive($li, $arr, $clName){
    for($i = 0; $i < $arr.length; $i++){
        if($li[0] != $arr[$i]){
            $arr[$i].classList.remove($clName);
        }
    }
}
//bỏ hiển thị
function removeDisplay($li, $arr){
    for($i = 0; $i < $arr.length; $i++){
        if($li != $arr[$i]){
            $arr[$i].classList.add("d-none");
        }
    }
}
//ajax
function getDataAccount(fileName){
    $.post("/ajax/adminAccount",{
        id: fileName
    },
        function (data) {
            $("#dataAdmin").html(data);
            $oclAll = "getDataAcc('" + fileName + "', " + 2 +")";
            $oclActive = "getDataAcc('" + fileName + "', " + 1 +")";
            $oclBan = "getDataAcc('" + fileName + "', " + 0 +")";
            $("#allAcc").attr("onclick", $oclAll);
            $("#AccActive").attr("onclick", $oclActive);
            $("#AccBan").attr("onclick", $oclBan);
            $("#boxSearchAd").addClass(fileName);
        }
    );
}
function getDataRoom(status){
    $.post("/ajax/adminRoom",{
        status : status
    },
        function (data) {
            $("#dataAdmin").html(data);
            $("#allRoom").attr("onclick", "getDataRoom(1)");
            $("#activeRoom").attr("onclick", "getDataRoomStatus('active')");
            $("#TimeoutRoom").attr("onclick", "getDataRoomStatus('time')");
            $("#waitingRoom").attr("onclick", "getDataRoomStatus('waiting')");
            $("#boxSearchAd").addClass("boxSearchAd_" + status);
        }
    );
}
// show menu cấp 2
$(".menu_c1").click(function(){
    $local_li = localLi($(this), $(".menu_c1"));
    $(".ul_menu_c2")[$local_li].classList.toggle("d-none");
    removeDisplay($(".ul_menu_c2")[$local_li], $(".ul_menu_c2"));
    $(this)[0].classList.toggle("bg-colors");
    $(this)[0].classList.toggle("active");
    
    JSON.parse
    removeActive($(this), $(".menu_c1"), "bg-colors");
    removeActive($(this), $(".menu_c1"), "active");
    
});
// menu cấp 2 select
$(".menu_c2").click(function(){
    $local_li = localLi($(this), $(".menu_c2"));
    $(this)[0].classList.toggle("list-group-item-info");
    removeActive($(this), $(".menu_c2"), "list-group-item-info");
    $fileName = $(this).attr("id");
    $("#title_admin").html($(this).text());
    $start = $fileName.lastIndexOf("_") + 1;
    $end = $fileName.length;
    $func = $fileName.slice($start, $end);
    if($func == "Account"){
        getDataAccount($fileName);
    }
    if($func == "Room"){
        if($fileName == "report_Room"){
            getDataRoom(2);
        }else{
            getDataRoom(1);
        }
        
    }
});
$("slt").click(function(){
    console.log($(this));
})
$("#closedPost").click(function(){
    history.back();
})
window.onload = function(){
    // document.getElementById(inlineFormCustomSelectPref).value() = infor_gender;
}