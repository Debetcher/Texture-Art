<?php

namespace PackInvite;

class PackInvite extends \Database {




  //selectiert alle pack einladungen die vom Empfänger noch nicht behandelt wurden
  protected function db_getPIBYUser($username){

    $sql = "SELECT requested.username AS requested, user.username AS username, pack.name, pack_invite.id, pack_invite.date FROM pack_invite
            JOIN user AS requested ON requested_id = requested.id
            JOIN user ON user.id = user_id
            JOIN pack ON pack.id = pack_id
            WHERE pack_invite.accepted = 0
            AND pack_invite.rejected = 0
            AND user.username = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);

    $results = $stmt->fetchAll();
    return $results;

  }

  protected function db_getPIBYPack($pack_id){

    $sql = "SELECT requested.username AS requested, user.username AS username, pack.name, pack_invite.id, pack_invite.date FROM pack_invite
            JOIN user AS requested ON requested_id = requested.id
            JOIN user ON user.id = user_id
            JOIN pack ON pack.id = pack_id
            WHERE pack_invite.accepted = 0
            AND pack_invite.rejected = 0
            AND pack.id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$pack_id]);

    $results = $stmt->fetchAll();
    return $results;

  }

  protected function db_acceptPI($invite_id){

    $sql = "UPDATE pack_invite SET accepted = true  WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$invite_id]);

  }

  protected function db_rejectPI($invite_id){

    $sql = "UPDATE pack_invite SET rejected = true  WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$invite_id]);

  }

  protected function db_setPI($user_id, $requested_id, $pack_id){

    $sql = "INSERT INTO pack_invite(user_id, requested_id, pack_id) VALUES (?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id, $requested_id, $pack_id]);

  }

  protected function db_deletePI($piID){

    $sql = "DELETE FROM pack_invite WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$piID]);

  }













}
