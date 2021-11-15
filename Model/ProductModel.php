<?php
include_once "Database/DB.php";
include_once "BaseModel.php";

class ProductModel extends BaseModel
{
    protected $table = "products";

    public function getById($id)
    {
        $sql = "SELECT*FROM $this->table WHERE id = $id";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO $this->table(`name`,`category`,`price`,`quantity`,`date_create`,`description`) VALUES(?,?,?,?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1,$data["name"]);
        $stmt->bindParam(2,$data["category"]);
        $stmt->bindParam(3,$data["price"]);
        $stmt->bindParam(4,$data["quantity"]);
        $stmt->bindParam(5,$data["date_create"]);
        $stmt->bindParam(6,$data["description"]);
        $stmt->execute();
    }

    public function update($data)
    {
        try {
            $sql = "UPDATE $this->table SET `name`=?,`category`=?,`price`=?,`quantity`=?,`date_create`=?,`description`=? WHERE `id`=?";
            $stmt = $this->dbConnect->prepare($sql);
            $stmt->bindParam(1,$data["name"]);
            $stmt->bindParam(2,$data["category"]);
            $stmt->bindParam(3,$data["price"]);
            $stmt->bindParam(4,$data["quantity"]);
            $stmt->bindParam(5,$data["date_create"]);
            $stmt->bindParam(6,$data["description"]);
            $stmt->bindParam(7,$data["id"]);
            $stmt->execute();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}