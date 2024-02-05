document.addEventListener('DOMContentLoaded', function () {
    const variantsContainer = document.getElementById('variants-container');
    const addVariantButton = document.getElementById('add-variant');
    let variantIndex = 0;

    addVariantButton.addEventListener('click', function () {
        variantIndex++;

        const newVariant = document.createElement('div');
        newVariant.className = 'variant row';
        newVariant.innerHTML = `
            <div class="col-md-2">
                <input type="text" name="variants[${variantIndex}][variant_price]" placeholder="Price" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" name="variants[${variantIndex}][variant_specialPrice]" placeholder="Special Price" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" name="variants[${variantIndex}][variant_quantity]" placeholder="Quantity" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" name="variants[${variantIndex}][variant_sellerSKU]" placeholder="SellerSKU" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" name="variants[${variantIndex}][variant_colour]" placeholder="Color" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="file" name="variants[${variantIndex}][variant_image]" placeholder="Photo" class="form-control">
            </div>
        `;
        variantsContainer.appendChild(newVariant);
    });
});


