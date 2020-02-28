<?php
function getComments($postid){
    $data = $this->db->prepare("select * from comment where post_id = :postid");
    $data->execute([':postid'=>$postid]);
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;

  }  