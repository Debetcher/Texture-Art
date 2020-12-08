<?php

namespace Pack;

class Pack extends \Database {


  /**
  * @param {number} x - Pack ID
  */
  protected function db_getPack($id){

    $sql = "SELECT 	pack.id,
            		    pack.name,
                    pack.ingame_name,
                    pack.description,
                    pack.pack_picture,
                    pack.path,
                    pack_status.name AS status,
                    pack_categorie.name AS categorie,
                    pack_type.name AS type,
                    pack_version.name AS version,
                    (SELECT COUNT(pack_id) FROM user_like_pack  WHERE pack_id = pack.id) AS likes,
                    (SELECT COUNT(pack_id) FROM user_download_pack  WHERE pack_id = pack.id) AS downloads
            FROM pack
            LEFT JOIN user_like_pack ON pack.id=user_like_pack.pack_id
            LEFT JOIN user_download_pack ON pack.id=user_download_pack.pack_id
            JOIN pack_status ON pack.status_id = pack_status.id
            JOIN pack_categorie ON pack.categorie_id = pack_categorie.id
            JOIN pack_type ON pack.type_id = pack_type.id
            JOIN pack_version ON pack.version_id = pack_version.id
            WHERE pack.id = ?
            GROUP BY pack.id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    $results = $stmt->fetchAll();
    return $results;



  }

  protected function db_getPacks(){

    $sql = "SELECT 	pack.id,
            		    pack.name,
                    pack.ingame_name,
                    pack.description,
                    pack.pack_picture,
                    pack.path,
                    pack_status.name AS status,
                    pack_categorie.name AS categorie,
                    pack_type.name AS type,
                    pack_version.name AS version,
                    (SELECT COUNT(pack_id) FROM user_like_pack  WHERE pack_id = pack.id) AS likes,
                    (SELECT COUNT(pack_id) FROM user_download_pack  WHERE pack_id = pack.id) AS downloads
            FROM pack
            LEFT JOIN user_like_pack ON pack.id=user_like_pack.pack_id
            LEFT JOIN user_download_pack ON pack.id=user_download_pack.pack_id
            JOIN pack_status ON pack.status_id = pack_status.id
            JOIN pack_categorie ON pack.categorie_id = pack_categorie.id
            JOIN pack_type ON pack.type_id = pack_type.id
            JOIN pack_version ON pack.version_id = pack_version.id
            GROUP BY pack.id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }


  //get newest packs
  protected function db_getPacksByDate(){

    $sql = "SELECT 	pack.id,
            		    pack.name,
                    pack.ingame_name,
                    pack.description,
                    pack.pack_picture,
                    pack.path,
                    pack_status.name AS status,
                    pack_categorie.name AS categorie,
                    pack_type.name AS type,
                    pack_version.name AS version,
                    (SELECT COUNT(pack_id) FROM user_like_pack  WHERE pack_id = pack.id) AS likes,
                    (SELECT COUNT(pack_id) FROM user_download_pack  WHERE pack_id = pack.id) AS downloads
            FROM pack
            LEFT JOIN user_like_pack ON pack.id=user_like_pack.pack_id
            LEFT JOIN user_download_pack ON pack.id=user_download_pack.pack_id
            JOIN pack_status ON pack.status_id = pack_status.id
            JOIN pack_categorie ON pack.categorie_id = pack_categorie.id
            JOIN pack_type ON pack.type_id = pack_type.id
            JOIN pack_version ON pack.version_id = pack_version.id
            GROUP BY pack.id
            ORDER BY pack.upload_date DESC";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  //get newest packs
  protected function db_getPacksByUser($user_id){

    $sql = "SELECT 	pack.id,
                    pack.name,
                    pack.ingame_name,
                    pack.description,
                    pack.pack_picture,
                    pack.path,
                    pack_status.name AS status,
                    pack_categorie.name AS categorie,
                    pack_type.name AS type,
                    pack_version.name AS version,
                    (SELECT COUNT(pack_id) FROM user_like_pack  WHERE pack_id = pack.id) AS likes,
                    (SELECT COUNT(pack_id) FROM user_download_pack  WHERE pack_id = pack.id) AS downloads
            FROM pack
            LEFT JOIN user_like_pack ON pack.id=user_like_pack.pack_id
            LEFT JOIN user_download_pack ON pack.id=user_download_pack.pack_id
            JOIN pack_status ON pack.status_id = pack_status.id
            JOIN pack_categorie ON pack.categorie_id = pack_categorie.id
            JOIN pack_type ON pack.type_id = pack_type.id
            JOIN pack_version ON pack.version_id = pack_version.id
            JOIN profile_pack ON profile_pack.pack_id = pack.id
            JOIN user ON profile_pack.profile_id = user.id
            WHERE user.id = ?
            GROUP BY pack.id
            ORDER BY pack.upload_date DESC";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$user_id]);

    $results = $stmt->fetchAll();
    return $results;
  }











  protected function db_getIDByName($name){

    $sql = "SELECT id FROM pack WHERE name = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function db_getPackById($pack_id){

    $sql = "SELECT * FROM pack WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$pack_id]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function db_getCreators($packID){

    $sql = "SELECT user.username, user.id, user.profile_picture
            FROM user
            JOIN profile_pack ON user.id = profile_pack.profile_id
            JOIN pack ON pack.id = profile_pack.pack_id
            WHERE pack.id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$packID]);

    $results = $stmt->fetchAll();
    return $results;
  }


  protected function db_setPack($name, $ingame_name, $description, $pack_picture, $path, $status_id, $categorie_id, $type_id, $version_id){



    $sql = "INSERT INTO pack(name, ingame_name, description, pack_picture, path, status_id, categorie_id, type_id, version_id)VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name, $ingame_name, $description, $pack_picture, $path, $status_id, $categorie_id, $type_id, $version_id]);




  }



  protected function db_updateName($value, $id){

    $sql = "UPDATE pack SET name = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }
  protected function db_updateIGName($value, $id){

    $sql = "UPDATE pack SET ingame_name = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }
  protected function db_updateDesc($value, $id){

    $sql = "UPDATE pack SET description = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }

  protected function db_updatePackPicture($value, $id){

    $sql = "UPDATE pack SET pack_picture = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }

  protected function db_updatePath($value, $id){

    $sql = "UPDATE pack SET path = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value, $id]);


  }

  protected function db_updateStatus($value, $id){

    $sql = "UPDATE pack SET status_id = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value[0]['id'], $id]);


  }
  protected function db_updateCat($value, $id){

    $sql = "UPDATE pack SET categorie_id = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value[0]['id'], $id]);


  }
  protected function db_updateType($value, $id){

    $sql = "UPDATE pack SET type_id = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value[0]['id'], $id]);


  }
  protected function db_updateVersion($value, $id){

    $sql = "UPDATE pack SET version_id = ? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value[0]['id'], $id]);


  }


  protected function db_deletePack($id){

    $sql = "DELETE FROM pack WHERE id = >?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

  }

  protected function db_setPackCreator($pack_id, $user_id){

        $sql = "INSERT INTO profile_pack(pack_id, profile_id)VALUES (?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$pack_id, $user_id]);

  }
  protected function db_deletePackCreator($pack_id, $user_id){

    $sql = "DELETE FROM profile_pack WHERE pack_id = ? AND profile_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$pack_id, $user_id]);

  }




  protected function db_checkIfEsists($pack_name, $pack_ig, $pack_description){

    $sql = "SELECT id FROM pack WHERE name = ? AND ingame_name = ? AND description = ? ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$pack_name, $pack_ig, $pack_description]);

    $results = $stmt->fetchAll();
    if ($results == null) {
      return false;
    }else {
      return true;
    }


  }







  //pack searching algo


  protected function db_searchPacks($value){
    $value = $value . '%';

    $sql = "SELECT 	pack.id,
            		    pack.name,
                    pack.ingame_name,
                    pack.description,
                    pack.pack_picture,
                    pack.path,
                    pack_status.name AS status,
                    pack_categorie.name AS categorie,
                    pack_type.name AS type,
                    pack_version.name AS version,
                    (SELECT COUNT(pack_id) FROM user_like_pack  WHERE pack_id = pack.id) AS likes,
                    (SELECT COUNT(pack_id) FROM user_download_pack  WHERE pack_id = pack.id) AS downloads
            FROM pack
            LEFT JOIN user_like_pack ON pack.id=user_like_pack.pack_id
            LEFT JOIN user_download_pack ON pack.id=user_download_pack.pack_id
            JOIN pack_status ON pack.status_id = pack_status.id
            JOIN pack_categorie ON pack.categorie_id = pack_categorie.id
            JOIN pack_type ON pack.type_id = pack_type.id
            JOIN pack_version ON pack.version_id = pack_version.id
            WHERE pack.name LIKE ?
            GROUP BY pack.id
            LIMIT 6";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$value]);

    $results = $stmt->fetchAll();
    return $results;
  }


}
