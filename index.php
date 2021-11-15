<?php
include_once "Controller/ProductController.php";

$productController = new ProductController();

$page = (isset($_GET["page"]) ? $_GET["page"] : "");

switch ($page) {
    case "product-list":
        $productController->index();
        break;
    case "product-detail":
        $id = $_GET["id"];
        $productController->showDetail($id);
        break;
    case "product-delete":
        $productController->delete($_REQUEST["id"]);
        break;
    case "product-create":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $productController->showFormCreate();
        } else {
            $productController->create($_REQUEST);
        }
        break;
    case "product-update":
        $id = $_GET["id"];
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $productController->showFormUpdate();
        } else {
            $productController->update($id,$_REQUEST);
        }
        break;
}