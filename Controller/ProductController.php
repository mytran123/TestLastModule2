<?php
include_once "Model/ProductModel.php";

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->getAll();
        include_once "View/product-list.php";
    }

    public function showDetail($id)
    {
        $product = $this->productModel->getById($id);
        include_once "View/product-detail.php";
    }

    public function delete($id)
    {
        if ($this->productModel->getById($id) !== null) {
            $this->productModel->delete($id);
            header("location:index.php?page=product-list");
        }
    }

    public function showFormCreate()
    {
        include_once "View/product-create.php";
    }

    public function create($data)
    {
        $data = [
            "name" => $data['name'],
            "category" => $data['category'],
            "price" => $data['price'],
            "quantity" => $data['quantity'],
            "date_create" => $data['date_create'],
            "description" => $data['description']
        ];
        $this->productModel->create($data);
        header("location:index.php?page=product-list");
    }

    public function showFormUpdate()
    {
        $id = $_REQUEST["id"];
        $product = $this->productModel->getById($id);
        include_once "View/product-update.php";
    }

    public function update($id,$request)
    {
        $product = $this->productModel->getById($id);
        $data = [
            "name"=>$request['name'],
            "category"=>$request['category'],
            "price"=>$request['price'],
            "quantity"=>$request['quantity'],
            "date_create"=>$request['date_create'],
            "description"=>$request['description'],
            "id"=>$id
        ];
        $this->productModel->update($data);
        header("location:index.php?page=product-list");
    }
}