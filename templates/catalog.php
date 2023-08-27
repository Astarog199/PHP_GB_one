<h2>Каталог</h2>

<div>
        <?php foreach ($catalog as $item) : ?>
            <div>
                    <?=$item['name']?> <br>
                    <img class= "catalog_item_jpg" src="/pic/<?=$item['image']?>" alt="" width = 100px >
                    Цена: <?= $item['price']?><br>
                    <button>Купить</button>
                    <hr>
            </div>
        <?php endforeach; ?>
</div>