<?php
if (ADDT_IMAGE_SWAPPER_ENABLE == 'true') {
    ?>
    <script language="javascript" type="text/javascript">
        $(document).ready(function () {
            var productsAdditionalImagesId = '<?php echo ADDT_IMAGE_SWAPPER_ADDTL_IMG_ID; ?>';
            var productsMainImageId = '<?php echo ADDT_IMAGE_SWAPPER_MAIN_IMG_ID; ?>';
            var additionalImagesClass = '<?php echo ADDT_IMAGE_SWAPPER_ADDTL_IMG_CLASS; ?>';
            var smallImageHeight = '<?php echo SMALL_IMAGE_HEIGHT; ?>';
            var smallImageWidth = '<?php echo SMALL_IMAGE_WIDTH; ?>';

            function addAdditionalImage(imgHref, imgAlt, imgSrc) {
                var imgDiv = '<div class="' + additionalImagesClass + ' centeredContent back">';
                imgDiv = imgDiv + '<a href="' + imgHref + '" class="current">';
                imgDiv = imgDiv + '<img src="' + imgSrc + '" title="' + imgAlt + '" alt="' + imgAlt + '" height="' + $('#' + smallImageHeight + '" width="' + smallImageWidth + '" />';
                imgDiv = imgDiv + '</a></div>';
                return imgDiv;
            }
         //   $("#" + productsAdditionalImagesId).html(addAdditionalImage($("#" + productsMainImageId + " a").attr("href"), $("#" + productsMainImageId + " a img").attr("alt"), $("#" + productsMainImageId + " a img").attr("src")) + $("#" + productsAdditionalImagesId).html());

            $('#' + productsAdditionalImagesId + ' a').click(function () {

                $('#' + productsAdditionalImagesId + ' a').each(function () {
                    $(this).removeClass('current');
                });
                $(this).addClass('current');
                $('#' + productsMainImageId + ' a').attr('href', $(this).attr('href'));
                $('#' + productsMainImageId + ' a img').attr('src', $(this).find("img").attr('src'));
                $('#' + productsMainImageId + ' a img').attr('alt', $(this).find("img").attr('alt'));
                $('#' + productsMainImageId + ' a img').attr('title', $(this).find("img").attr('title'));
                $('#' + productsMainImageId).show();
                return false;
            });
        });
    </script>
    <?php
}