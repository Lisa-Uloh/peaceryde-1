<?php    



class Upload {
    private $connection;

    function __construct($connection){
        $this->connection = $connection;
    }

    public function uploadFile(array $file, $des)
    {
        extract($file);

        $file_name = $file['name'];
        $file_size = $file['size'];
        $file = $file['tmp_name'];
        $file_ext = explode('.', $file['name'])[count(explode('.', $file['name'])) - 1];

        $extensions = array("jpeg", "jpg", "png", "pdf");

        if(!in_array($file_ext, $extensions)){
            return [
                'status' => 'error',
                'message' => 'File extension not allowed. Please choose a different file.'
            ];
            exit();
        }

        if($file_size > 2097152){
            return [
                'status' => 'error',
                'message' => 'File extension not allowed. Please choose a different file.'
            ];
            exit();
        }

        $file_name = time() . "_" . explode(".", $file_name)[0] . "." . $file_ext;
        $file_path = $des . $file_name;

        if(move_uploaded_file($file, $file_path)){
            return [
                'status' => 'success',
                'message' => 'File uploaded successfully.',
                'file_name' => $file_name
            ];
            exit();
        }
        else{
            return [
                'status' => 'error',
                'message' => 'File upload failed.'
            ];
            exit();
        }
    }

    public function uploadToDB($userid, $filename, $name, $kind)
    {
        $files = $filename;
        // if(is_array($filename)) {
        // }
        // else {
        //     $files = json_encode([$filename]);
        // }

        $query = "INSERT INTO `uploads`(`user_id`, `name`, `service_id`, `files`, `status`) VALUES (:userid, :name, :kind, :filename, :status)";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userid' => $userid,
            'name' => $name,
            'kind' => $kind,
            'filename' => $files,
            'status' => "Awaiting approval"
        ]);

        if($result) {
            return true;
            exit();
        }
        else {
            return false;
            exit();
        }
    }

    public function getUserUploads($userId)
    {
        $query = "SELECT * FROM `uploads` WHERE `user_id` = :userid AND `service_id` != :serviceid";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userid' => $userId,
            'serviceid' => "PROFILE"
        ]);

        if($result) return $result->fetchAll();
        else return false;
    }

    public function getUsersProfile($userId)
    {
        $query = "SELECT * FROM `uploads` WHERE `user_id` = :userid AND `service_id` = :kind";
        $result = $this->connection->prepare($query);
        $result->execute([
            'userid' => $userId,
            'kind' => 'PROFILE'
        ]);

        if($result) return $result->fetchAll();
        else return false;
    }


    
}