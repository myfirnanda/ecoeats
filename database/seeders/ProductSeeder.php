<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

function generateRandomSKU($length = 12) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $max)];
    }
    return $randomString;
}

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $products = [
            // Product 1
            [
                "image_cover" => "onions-cover.png",
                "name" => "Spring Onions 1 Bunch",
                "slug" => "spring-onions-1-bunch",
                "sku_code" => generateRandomSKU(),
                "price" => 2500,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 300,
                "summary" => "Fresh spring onions for your cooking needs",
                "description" => "Discover the vibrant freshness and distinct flavor of our Spring Onion Bunch, harvested at peak maturity to deliver unparalleled taste and quality. Bursting with crispness and a mild oniony bite, these lush green bunches are perfect for adding a flavorful kick to salads, stir-fries, soups, and more. Whether used as a garnish or a featured ingredient, our Spring Onions promise to elevate your culinary creations with their vibrant color and aromatic essence. Sourced from trusted growers committed to sustainable practices, our Spring Onion Bunches offer a delightful addition to your kitchen repertoire, ensuring every dish is infused with the crisp, garden-fresh goodness of springtime.",
                "category_id" => 1,
            ],

            // Product 2
            [
                "image_cover" => "prawn-cover.png",
                "name" => "Fresh Brine King Prawns 900gr",
                "slug" => "fresh-brine-king-prawns-900gr",
                "sku_code" => generateRandomSKU(),
                "price" => 120000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 900,
                "summary" => "High-quality brine king prawns fresh and cheap",
                "description" => "Indulge in the supreme freshness and succulent taste of our 'Fresh Brine Prawn' selection, sourced directly from the pristine coastal waters. Responsibly harvested and carefully handled, these premium prawns guarantee a culinary experience like no other. Whether grilled to perfection, sautéed with aromatic herbs, or added to your favorite seafood dishes, our prawns promise versatility and unrivaled quality. With each bite, savor the rich flavors and nutrient-rich goodness of these ocean treasures, ensuring a delightful and wholesome dining experience every time.",
                "category_id" => 4,
            ],

            // Product 3
            [
                "image_cover" => "purple-grape-cover.png",
                "name" => "Autumn Royal Grape 500gr",
                "slug" => "autumn-royal-grape-500gr",
                "sku_code" => generateRandomSKU(),
                "price" => 15000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "Sweet and crisp green apples.",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, sint? Minima minus enim debitis inventore quisquam blanditiis reprehenderit nisi doloribus voluptates quidem ducimus a nam eum culpa repellat incidunt quibusdam rerum earum eligendi explicabo, veniam, eius nobis! Quos, dolorem odio autem ipsa, labore aperiam iure, repellendus fuga et doloremque eveniet!",
                "category_id" => 3,
            ],

            // Product 4
            [
                "image_cover" => "oyster-mushroom-cover.png",
                "name" => "Oyster Mushroom 500gr",
                "slug" => "oyster-mushroom-500gr",
                "sku_code" => generateRandomSKU(),
                "price" => 35000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "lorem ipsum",
                "description" => "Fresh oyster mushrooms for your recipes. Discover the exquisite flavor and versatility of our Oyster Mushrooms, cultivated with care and expertise to deliver unparalleled freshness and taste. Sourced from sustainable farms, these tender and succulent mushrooms are perfect for elevating your culinary creations, whether sautéed, grilled, or added to soups and stir-fries. Packed with nutrients and boasting a delicate texture, our Oyster Mushrooms are the ideal choice for health-conscious food enthusiasts and gourmet chefs alike, promising an unforgettable gastronomic experience with every bite.",
                "category_id" => 4,
            ],

            // Product 5
            [
                "image_cover" => "chestnut-mushroom-cover.png",
                "name" => "Chestnut Mushroom 500gr",
                "slug" => "chestnut-mushroom-500-gr",
                "sku_code" => generateRandomSKU(),
                "price" => 28000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "Nutty and flavorful chestnut mushrooms.",
                "description" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, sint? Minima minus enim debitis inventore quisquam blanditiis reprehenderit nisi doloribus voluptates quidem ducimus a nam eum culpa repellat incidunt quibusdam rerum earum eligendi explicabo, veniam, eius nobis! Quos, dolorem odio autem ipsa, labore aperiam iure, repellendus fuga et doloremque eveniet!",
                "category_id" => 4,
            ],

            // Product 6
            [
                "image_cover" => "blueberries-cover.png",
                "name" => "Blueberries 125gr",
                "slug" => "blueberries-125-gr",
                "sku_code" => generateRandomSKU(),
                "price" => 14000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 125,
                "summary" => "Indulge in the vibrant sweetness and antioxidant-rich goodness of our Blueberries",
                "description" => "Handpicked at the peak of ripeness to ensure unparalleled freshness and flavor. Bursting with juicy goodness and vibrant hues, these plump blue gems are perfect for snacking, baking, or adding a nutritious boost to your favorite smoothies and desserts. Packed with vitamins, minerals, and phytonutrients, our Blueberries offer a deliciously wholesome way to fuel your body and tantalize your taste buds. Elevate your culinary creations with the exquisite taste and nutritional benefits of our premium Blueberries, sourced with care for your utmost satisfaction.",
                "category_id" => 2,
            ],

            // Product 7
            [
                "image_cover" => "green-apples-cover.png",
                "name" => "Green Apples 250gr",
                "slug" => "green-apples-250gr",
                "sku_code" => generateRandomSKU(),
                "price" => 15000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 250,
                "summary" => "lorem ipsum",
                "description" => "Sweet and crisp green apples. Explore the crisp sweetness and refreshing crunch of our Apples, handpicked from orchards brimming with natural goodness and meticulously selected to ensure premium quality. Bursting with vitamins, fiber, and irresistible flavor, these juicy fruits are perfect for enjoying fresh as a healthy snack, slicing into salads, or incorporating into your favorite recipes for a touch of natural sweetness. With each bite, savor the crisp texture and succulent juiciness of our premium-grade Apples, offering a deliciously wholesome addition to your daily routine. Embark on a journey of taste and nutrition with our Apples, carefully curated for your utmost satisfaction and enjoyment.",
                "category_id" => 3,
            ],

            // Product 8
            [
                "image_cover" => "chuck-steak-cover.png",
                "name" => "Halal Chuck Steak 500gr",
                "slug" => "halal-chuck-steak-500gr",
                "sku_code" => generateRandomSKU(),
                "price" => 90000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "lorem ipsum",
                "description" => "Halal-certified chuck steak for your dishes. Explore the exceptional quality and savory taste of our Halal Chuck Steak, meticulously sourced from premium cuts of meat and prepared with the utmost attention to Halal standards. Bursting with rich flavor and tender juiciness, our Chuck Steak offers a culinary experience that's both indulgent and wholesome. Perfect for grilling, roasting, or pan-searing, this succulent steak is sure to delight the palate of discerning meat enthusiasts and Halal-conscious consumers alike. Elevate your dining experience with our Halal Chuck Steak, crafted to perfection for unforgettable meals every time.",
                "category_id" => 6,
            ],

            // Product 9
            [
                "image_cover" => "avocado-cover.png",
                "name" => "Butter Avocado 500gr",
                "slug" => "butter-avocado-500gr",
                "sku_code" => generateRandomSKU(),
                "price" => 18000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "lorem ipsum",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut accusantium voluptas eum quod debitis dicta possimus. Quidem ducimus inventore quia nisi consectetur asperiores, nemo aliquam deserunt itaque, earum nostrum eum.",
                "category_id" => 1,
            ],

            // Product 10
            [
                "image_cover" => "dory-cover.png",
                "name" => "Fresh Dory Fish",
                "slug" => "fresh-dory-fish",
                "price" => 16000,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 250,
                "summary" => "lorem ipsum",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut accusantium voluptas eum quod debitis dicta possimus. Quidem ducimus inventore quia nisi consectetur asperiores, nemo aliquam deserunt itaque, earum nostrum eum.",
                "category_id" => 1,
            ],

            // Product 11
            [
                "image_cover" => "green-grape-cover.png",
                "name" => "green grape",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 12
            [
                "image_cover" => "kiwi-cover.png",
                "name" => "kiwi",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 13
            [
                "image_cover" => "lobster-cover.png",
                "name" => "fresh king lobster",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 14
            [
                "image_cover" => "radish-cover.png",
                "name" => "radish",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // product 15
            [
                "image_cover" => "strawberry-cover.png",
                "name" => "strawberry",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 16
            [
                "image_cover" => ".png",
                "name" => "Almond Milk",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 17
            [
                "image_cover" => "bagel-cover.png",
                "name" => "Bagel",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            //Product 18
            [
                "image_cover" => "baguette-cover.png",
                "name" => "Baguette",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 19
            [
                "image_cover" => "banana-cover.png",
                "name" => "Banana",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 20
            [
                "image_cover" => ".png",
                "name" => "Brussel Sprouts 1Kg",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 21
            [
                "image_cover" => "fresh-fusion_health-suplement.png",
                "name" => "Fresh Fusion - Health Supplement",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 22
            [
                "image_cover" => "goat-milk-cover.png",
                "name" => "Goat Milk",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 23
            [
                "image_cover" => "low-fat-milk-cover.png",
                "name" => "Low Fat Milk",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 24
            [
                "image_cover" => "lychee-cover.png",
                "name" => "Lychee 500Gr",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

            // Product 25
            [
                "image_cover" => "melon-cover.png",
                "name" => "Melon",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

        //     // Product 26
        //     [
        //         "image_cover" => ".png",
        //         "name" => "Nectarine",
        //         "slug" => "",
        //         "price" => 1,
        //         "stock" => rand(0, 100),
        //         "sold" => rand(0, 100),
        //         "description" => "",
        //         "category_id" => 1,
        //     ],

            // Product 27
            [
                "image_cover" => "octopus-cover.png",
                "name" => "Octopus",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

        //     // Product 28
        //     [
        //         "image_cover" => ".png",
        //         "name" => "Oyster",
        //         "slug" => "",
        //         "price" => 1,
        //         "stock" => rand(0, 100),
        //         "sold" => rand(0, 100),
        //         "description" => "",
        //         "category_id" => 1,
        //     ],

            // Product 29
            [
                "image_cover" => "purepulse_antioxidant-juice.png",
                "name" => "PurePulse - Antioxidant Juice For Health",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

        //     // Product 30
        //     [
        //         "image_cover" => ".png",
        //         "name" => "Raspberry",
        //         "slug" => "",
        //         "price" => 1,
        //         "stock" => rand(0, 100),
        //         "sold" => rand(0, 100),
        //         "description" => "",
        //         "category_id" => 1,
        //     ],

            // Product 31
            [
                "image_cover" => "squid-cover.png",
                "name" => "Squid",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],

        //     // Product 32
        //     [
        //         "image_cover" => ".png",
        //         "name" => "VitaFresh - Detox Juice",
        //         "slug" => "",
        //         "price" => 1,
        //         "stock" => rand(0, 100),
        //         "sold" => rand(0, 100),
        //         "description" => "",
        //         "category_id" => 1,
        //     ],

            // Product 33
            [
                "image_cover" => "wheat-bread-cover.png",
                "name" => "Wheat Bread",
                "slug" => "",
                "sku_code" => generateRandomSKU(),
                "price" => 1,
                "stock" => rand(0, 100),
                "sold" => rand(0, 100),
                "weight" => 500,
                "summary" => "",
                "description" => "",
                "category_id" => 1,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
