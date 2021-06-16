<?php
    $room = json_decode($data["room"]);
    $room = (array)$room[0];
    $voteCount = $data["voteCount"];
    $voteStar = json_decode($data["voteStar"]);
    $voteStar = (array)$voteStar;
    $voteMedium = round(($voteStar["v1s"]*1 + $voteStar["v2s"]*2 + $voteStar["v3s"]*3 + $voteStar["v4s"]*4 + $voteStar["v5s"]*5)/$voteCount, 1);
    $perVote = array();
    $maxVote = 0;
    foreach($voteStar as $value){
        if($value > $maxVote){
            $maxVote = $value;
        }
    }
    foreach($voteStar as $key => $value){
        $perVote[$key] = ($value/$maxVote)*100;
    }

?>
<h4 class="mt-2 text-truncate w-100">Hỏi đáp & đánh giá về <?php echo $room["room_title"]; ?></h4>
<div class="row">
    <div class="col-12 col-sm-12 col-md-3 col-lg-3 border p-2 pt-5 text-center">
        <p class="text-colors mb-1"><?php echo $voteMedium; ?> <i class="fas fa-star"></i></p>
        <p><?php echo $voteCount; ?> đánh giá</p>
    </div>
    <div class="col-12 col-sm-8 col-md-6 col-lg-6 border p-2">
        <div class="w-100 d-flex mb-2">
            <span class="text-muted form_vote_star">5 sao</span>
            <div class="form_vote_line  ">
                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                <span style="width:<?php echo $perVote["v5s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
            </div>
            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v5s"] ?></span>
        </div>
        <div class="w-100 d-flex mb-2">
            <span class="text-muted form_vote_star">4 sao</span>
            <div class="form_vote_line  ">
                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                <span style="width:<?php echo $perVote["v4s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
            </div>
            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v4s"] ?></span>
        </div>
        <div class="w-100 d-flex mb-2">
            <span class="text-muted form_vote_star">3 sao</span>
            <div class="form_vote_line  ">
                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                <span style="width:<?php echo $perVote["v3s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
            </div>
            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v3s"] ?></span>
        </div>
        <div class="w-100 d-flex mb-2">
            <span class="text-muted form_vote_star">2 sao</span>
            <div class="form_vote_line  ">
                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                <span style="width:<?php echo $perVote["v2s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
            </div>
            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v2s"] ?></span>
        </div>
        <div class="w-100 d-flex mb-2">
            <span class="text-muted form_vote_star">1 sao</span>
            <div class="form_vote_line  ">
                <span class="w-100 badge badge-pill badge-light d-inline-block"></span>
                <span style="width:<?php echo $perVote["v1s"]; ?>%" class="badge badge-pill badge-warning d-inline-block pt-1 px-0"></span>
            </div>
            <span class="text-muted text-right form_vote_star"><?php echo $voteStar["v1s"] ?></span>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-3 col-lg-3 border p-2 pt-5 text-center">
        <p class="mb-1">Đánh giá ngay</p>
        <button id="btn_comment" class="btn_comment btn btn-colorbg">Đánh giá</button>
    </div>
</div>

<script>
    $("#btn_comment").click(function(){
    show_comment();
    });
</script>