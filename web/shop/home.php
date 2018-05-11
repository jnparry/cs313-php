<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop | Home</title>
        <link rel="stylesheet" href="index.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    </head>
    
    <body>
        <?php require "navbar.php"?>
        <div id="header">
            <h1>Masks</h1>
        </div>
        
        <div id="browse">
            <form action="/shop/phpSession.php" method="post">
                <input type="hidden" id="selectedItem" value="" name="yourItem">
                <table>
                    <tr>
                        <td>
                            <p>Deku Mask</p>
                            <img id="pic" src="https://pre00.deviantart.net/2677/th/pre/f/2012/030/0/6/deku_mask_by_blueamnesiac-d4o3mwf.png" alt="Zelda Deku Mask">
                        </td>
                        <td>
                            <a id="dekMask" class="detail" onclick="">View details</a>
                        </td>
                        <td>
                            <p>$49.99</p>
                            <button onClick="add('dekMask')">Add to cart</button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Keaton Mask</p>
                            <img id="pic" src="https://orig00.deviantart.net/2de5/f/2012/020/8/6/keaton_mask_by_blueamnesiac-d4n04xk.png" alt="Zelda Keaton Mask">
                        </td>
                        <td>
                            <a id="keaMask" class="detail" onclick="">View details</a>
                        </td>
                        <td>
                            <p>$49.99</p>
                            <button onClick="add('keaMask')">Add to cart</button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Kafei Mask</p>
                            <img id="pic" src="https://pre00.deviantart.net/80e5/th/pre/f/2012/025/d/7/kafei__s_mask_by_blueamnesiac-d4nlgmh.png" alt="Zelda Kafei Mask">
                        </td>
                        <td>
                            <a id="kafMask" class="detail" onclick="">View details</a>
                        </td>
                        <td>
                            <p>$49.99</p>
                            <button onClick="add('kafMask')">Add to cart</button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Goron Mask</p>
                            <img id="pic" src="https://pre00.deviantart.net/4b94/th/pre/f/2012/031/3/5/goron_mask_by_blueamnesiac-d4o7875.png" alt="Zelda Goron Mask">
                        </td>
                        <td>
                            <a id="gorMask" class="detail" onclick="">View details</a>
                        </td>
                        <td>
                            <p>$49.99</p>
                            <button onClick="add('gorMask')">Add to cart</button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Majora's Mask</p>
                            <img id="pic" src="https://pre00.deviantart.net/b9bb/th/pre/f/2012/036/0/1/majora__s_mask_by_blueamnesiac-d4osuud.png" alt="Zelda Majora's Mask">
                        </td>
                        <td>
                            <a id="majMask" class="detail" onclick="">View details</a>
                        </td>
                        <td>
                            <p>$49.99</p>
                            <button onClick="add('majMask')">Add to cart</button>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p>Deity Mask</p>
                            <img id="pic" src="https://pre00.deviantart.net/fcbf/th/pre/f/2012/032/2/6/fierce_deity__s_mask_by_blueamnesiac-d4ob1ax.png" alt="Zelda Diety Mask">
                        </td>
                        <td>
                            <a id="deiMask" class="detail" onclick="">View details</a>
                        </td>
                        <td>
                            <p>$49.99</p>
                            <button onclick="setItem('Diety Mask')" type="submit">Add to cart</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <!-- Modal -->
        <div id="add" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p id="description"></p>
            </div>
        </div>
        
        <div id="bottom">
            <p id="info">Shop | Jordan Parry</p>
        </div>
    </body>
    
    <script src="home.js"></script>
</html>