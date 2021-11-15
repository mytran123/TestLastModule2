<table>
    <thead>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Date_create</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($products)): ?>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product["id"]?></td>
            <td><?php echo $product["name"]?></td>
            <td><?php echo $product["category"]?></td>
            <td><a href="product-detail.php?id=<?php echo $product["id"]?>">Detail</a></td>
            <td><a onclick="return confirm('Are you sure you want to delete this product?')" href="product-delete.php?id=<?php echo $product["id"]?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
