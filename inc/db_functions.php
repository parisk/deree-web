<?php

function get_all_products () {
    require(ROOT_PATH . "inc/db.php");
    try {
        $results = $db->query ("SELECT pname, price, image, description, cname
                                FROM categories, products
                                WHERE products.category_id = categories.id");
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
    }
    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);
    return $products_array;
}

//Change the limit to retrieve more than 4 latest products
function get_latest_products () {
    require(ROOT_PATH . "inc/db.php");
    try {
        $results = $db->query ("SELECT pname, price, image, description, cname
                                FROM categories, products
                                WHERE products.category_id = categories.id
                                ORDER BY date_added DESC
                                LIMIT 4");
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
    }
    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);
    return $products_array;
}

function get_all_categories() {
    require(ROOT_PATH . "inc/db.php");
    try {
        $results = $db->query ("SELECT cname, id FROM categories ORDER BY cname ASC");

    } catch (PDOException $e) {
        echo "error selecting categories" . $e;
    }

    $categories_array = $results->fetchAll (PDO::FETCH_ASSOC);
    return $categories_array;
}

function get_products_by_category ($category_id) {
    require(ROOT_PATH . "inc/db.php");
    try {
        $results = $db->prepare ("SELECT pname, price, image, description, cname
                                  FROM categories, products
                                  WHERE products.category_id = categories.id
                                  AND categories.id = ?");

        $results -> bindParam (1, $category_id);
        $results -> execute();
    } catch (PDOException $e) {
        echo "error selecting products" . $e;
    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);
    return $products_array;
}

function search ($search) {
    require(ROOT_PATH . "inc/db.php");
    $search = strtoupper($search);
    try {
        $results = $db->prepare ("SELECT pname, price, image, description, cname
                                    FROM categories, products
                                    WHERE products.category_id = categories.id
                                    AND (UPPER(pname) LIKE ? OR UPPER(description) LIKE ?) ");
        $search = "%" . $search . "%";
        $results -> bindParam (1, $search);
        $results -> bindParam (2, $search);
        $results -> execute();
    } catch (PDOException $e) {
        echo "Search Error" . $e;
    }

    $products_array = $results->fetchAll (PDO::FETCH_ASSOC);
    return $products_array;
}
?>