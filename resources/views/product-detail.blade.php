<html class="no-js" lang="en">
@include('partials.layout.header')
    <body class="prestige--v4 template-collection">
        @include('partials.layout.navbar')
        <main id="main" role="main">
            <!-- /spurit_sri-added -->
            <div id="shopify-section-product-template" class="shopify-section shopify-section--bordered" style="margin: 10%;">
                <section
                    class="Product Product--large"
                    data-section-id="product-template"
                    data-section-type="product"
                    data-section-settings='{
                      "enableHistoryState": true,
                      "templateSuffix": "",
                      "showInventoryQuantity": false,
                      "showSku": false,
                      "stackProductImages": false,
                      "showThumbnails": true,
                      "inventoryQuantityThreshold": 3,
                      "showPriceInButton": false,
                      "enableImageZoom": true,
                      "showPaymentButton": false,
                      "useAjaxCart": true
                    }'
                >
                    <div class="Product__Wrapper">
                        <div class="Product__Gallery Product__Gallery--withThumbnails">
                            <span id="ProductGallery" class="Anchor"></span>
                            <div class="Product__ActionList hidden-lap-and-up">
                                <div class="Product__ActionItem hidden-lap-and-up">
                                    <button class="RoundButton RoundButton--small RoundButton--flat" data-action="open-product-zoom">
                                        <svg class="Icon Icon--plus" role="presentation" viewBox="0 0 16 16">
                                            <g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <path d="M8,1 L8,15"></path>
                                                <path d="M1,8 L15,8"></path>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div
                                class="Product__Slideshow Product__Slideshow--zoomable Carousel"
                                data-flickity-config='{
                                "prevNextButtons": false,
                                "pageDots": true,
                                "adaptiveHeight": true,
                                "watchCSS": true,
                                "dragThreshold": 8,
                                "initialIndex": 0,
                                "arrowShape": {"x0": 20, "x1": 60, "y1": 40, "x2": 60, "y2": 35, "x3": 25}
                              }'
                            >
                                @foreach ($product->images as $item)
                                <div id="image-{{$item->id}}" class="Product__SlideItem Product__SlideItem--image Carousel__Cell" data-image-position-ignoring-video="12" data-image-position="12" data-image-id="{{$item->id}}">
                                    <div class="AspectRatio AspectRatio--withFallback" style="padding-bottom: 100%; --aspect-ratio: 1;">
                                        <img
                                            class="Image--lazyLoad Image--fadeIn"
                                            data-src="{{ getImage($item->image_url, 'products') }}"
                                            data-widths="[200,400,600,700,800,900,1000,1200,1400,1600]"
                                            data-sizes="auto"
                                            data-expand="-100"
                                            alt='{{ $product->product_name }}'
                                            data-max-width="2000"
                                            data-max-height="2000"
                                            data-original-src="{{ getImage($item->image_url, 'products') }}"
                                        />

                                        <span class="Image__Loader"></span>
                                        <noscript>
                                            <img src="/{{ getImage($item->image_url, 'products') }}" alt='{{ $product->product_name }}' />
                                        </noscript>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="Product__SlideshowNav Product__SlideshowNav--thumbnails">
                                <div class="Product__SlideshowNavScroller">
                                    @foreach ($product->images as $key => $item)
                                        <span data-index="{{$key}}" data-image-id="{{$item->id}}" class="Product__SlideshowNavImage AspectRatio {{ $key == 0 ? 'is-selected' : ''}}" style="--aspect-ratio: 1;">
                                            <img src="{{ getImage($item->image_url, 'products') }}" />
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <p data-mce-fragment="1"><strong>Signature:</strong></p>
                        <div>
                            @foreach ($product->signatures as $item)
                                <div style="height: 50px; width: 90%; text-align: left; align-items: center; margin: 5px;">
                                    <span>
                                        <img src="{{ getImage($item->signature_image, 'signature') }}" style="max-height: 100% !important; max-width: 100% !important; "/>
                                    </span>
                                    {{ $item->signature_title }} - {{ $item->signature_player_name }}
                                </div>
                            @endforeach
                        </div>
                        <div class="Product__InfoWrapper">
                            <div class="Product__Info">
                                <div class="Container">
                                    <div class="ProductMeta">
                                        <h2 class="ProductMeta__Vendor Heading u-h6">{{ $product->detail->brand->brand_title }}</h2>
                                        <h1 class="ProductMeta__Title Heading u-h2">{{ $product->product_name }}</h1>
                                        <div class="ProductMeta__PriceList Heading">
                                            <span class="ProductMeta__Price Price Text--subdued u-h4" data-money-convertible><span class="money">RP.
                                                {{ rupiah_format(intval($product->detail->retail_price ?? 0)) }}</span></span>
                                        </div>
                                    </div>
                                    <div style="margin: 50px;"></div>
                                        <a data-spiff-hide data-product-id="{{ $product->product_code }}"
                                            href="{{ $product->product_link }}" target="_blank"
                                            class="ProductForm__AddToCart Button Button--primary Button--full">
                                            <span>See at Tokopedia</span>
                                        </a>

                                        <style>
                                            .spiff-spinner-outer {
                                                animation: rotator 1s linear infinite;
                                            }
                                            .spiff-spinner-inner {
                                                stroke-dasharray: 45 180;
                                            }
                                            @keyframes rotator {
                                                0% {
                                                    transform: rotate(0deg);
                                                }
                                                100% {
                                                    transform: rotate(360deg);
                                                }
                                            }
                                        </style>

                                        {{-- <button
                                            class="spiff-api-button ProductForm__AddToCart Button Button--primary Button--full"
                                            data-product-id="6761452961907"
                                            onclick="openStandardWorkflowForProduct6761452961907(event)"
                                            style="display: none;"
                                        >
                                            &nbsp;&nbsp;&nbsp; CUSTOM &nbsp;&nbsp;&nbsp;
                                        </button> --}}
                                    <div class="Product__OffScreen"></div>

                                    <script>
                                        var product_variants_removed = [];
                                    </script>

                                    <script type="application/json" data-product-json>
                                        {
                                            "product": {
                                                "id": {{ $product->id }},
                                                "title": "{{ $product->product_name }}",
                                                "handle": "-",
                                                "description": "{!! $product->description !!}",
                                                "published_at": "2022-02-14T13:24:07+07:00",
                                                "created_at": "2022-02-14T07:43:19+07:00",
                                                "vendor": "{{ $product->detail->brand->brand_title }}",
                                                "type": "-",
                                                "tags": ["BLACK", "BLUE", "COLLABORATION", "COLLABS", "CREW", "DAILY", "GRAPHIC", "MEDIUM", "MEN", "MOCCA", "PURPLE", "RED", "SOCKS", "STAYCOOL SET", "WHITE"],
                                                "price": 29900000,
                                                "price_min": 29900000,
                                                "price_max": 29900000,
                                                "available": true,
                                                "price_varies": false,
                                                "compare_at_price": null,
                                                "compare_at_price_min": 0,
                                                "compare_at_price_max": 0,
                                                "compare_at_price_varies": false,
                                                "variants": [
                                                    {
                                                        "id": 39834973208691,
                                                        "title": "Default Title",
                                                        "option1": "Default Title",
                                                        "option2": null,
                                                        "option3": null,
                                                        "sku": "3220212152",
                                                        "requires_shipping": true,
                                                        "taxable": true,
                                                        "featured_image": null,
                                                        "available": true,
                                                        "name": "BOX SET \"AKU DAN KAMU\" MOCCA",
                                                        "public_title": null,
                                                        "options": ["Default Title"],
                                                        "price": 29900000,
                                                        "weight": 500,
                                                        "compare_at_price": null,
                                                        "inventory_management": "shopify",
                                                        "barcode": ""
                                                    }
                                                ],
                                                "images": [
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A1_38780038-5da6-4598-a741-2674d01acf06.jpg?v=1644800500",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A2.jpg?v=1644800500",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A3.jpg?v=1644800500",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A4.jpg?v=1644800500",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A5.jpg?v=1644800500",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A6.jpg?v=1644800500",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A7.jpg?v=1644800500",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/COOLMASKNONWOVENMOCCA_AMORFATI_-A1_1.jpg?v=1644800880",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/COOLMASKNONWOVENMOCCA_AMORFATI_-A2_1.jpg?v=1644800880",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_LASONATA_-A1_34b72673-551e-4ca8-b3ce-d427b123686f.jpg?v=1644800971",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_LASONATA_-A2_eb7f43c2-499d-4fa2-b1ed-026d761d75fc.jpg?v=1644800970",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_PYGMALION_-A1_e5b7c0be-25da-4dcb-9d42-a366ee47cbe6.jpg?v=1644800971",
                                                    "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_PYGMALION_-A2_3508a0ce-1ce9-4378-88e8-87d4222648c1.jpg?v=1644800971"
                                                ],
                                                "featured_image": "\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A1_38780038-5da6-4598-a741-2674d01acf06.jpg?v=1644800500",
                                                "options": ["Title"],
                                                "media": [
                                                    {
                                                        "alt": null,
                                                        "id": 21577905143923,
                                                        "position": 1,
                                                        "preview_image": {
                                                            "aspect_ratio": 1.0,
                                                            "height": 2000,
                                                            "width": 2000,
                                                            "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A1_38780038-5da6-4598-a741-2674d01acf06.jpg?v=1644800500"
                                                        },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A1_38780038-5da6-4598-a741-2674d01acf06.jpg?v=1644800500",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577905078387,
                                                        "position": 2,
                                                        "preview_image": { "aspect_ratio": 1.0, "height": 2000, "width": 2000, "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A2.jpg?v=1644800500" },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A2.jpg?v=1644800500",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577905111155,
                                                        "position": 3,
                                                        "preview_image": { "aspect_ratio": 1.0, "height": 2000, "width": 2000, "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A3.jpg?v=1644800500" },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A3.jpg?v=1644800500",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577914384499,
                                                        "position": 4,
                                                        "preview_image": { "aspect_ratio": 1.0, "height": 2000, "width": 2000, "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A4.jpg?v=1644800500" },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A4.jpg?v=1644800500",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577914417267,
                                                        "position": 5,
                                                        "preview_image": { "aspect_ratio": 1.0, "height": 2000, "width": 2000, "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A5.jpg?v=1644800500" },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A5.jpg?v=1644800500",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577914450035,
                                                        "position": 6,
                                                        "preview_image": { "aspect_ratio": 1.0, "height": 2000, "width": 2000, "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A6.jpg?v=1644800500" },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A6.jpg?v=1644800500",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577914351731,
                                                        "position": 7,
                                                        "preview_image": { "aspect_ratio": 1.0, "height": 2000, "width": 2000, "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A7.jpg?v=1644800500" },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/BOX-A7.jpg?v=1644800500",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577923919987,
                                                        "position": 8,
                                                        "preview_image": {
                                                            "aspect_ratio": 1.0,
                                                            "height": 2000,
                                                            "width": 2000,
                                                            "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/COOLMASKNONWOVENMOCCA_AMORFATI_-A1_1.jpg?v=1644800880"
                                                        },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/COOLMASKNONWOVENMOCCA_AMORFATI_-A1_1.jpg?v=1644800880",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577923952755,
                                                        "position": 9,
                                                        "preview_image": {
                                                            "aspect_ratio": 1.0,
                                                            "height": 2000,
                                                            "width": 2000,
                                                            "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/COOLMASKNONWOVENMOCCA_AMORFATI_-A2_1.jpg?v=1644800880"
                                                        },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/COOLMASKNONWOVENMOCCA_AMORFATI_-A2_1.jpg?v=1644800880",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577925558387,
                                                        "position": 10,
                                                        "preview_image": {
                                                            "aspect_ratio": 1.0,
                                                            "height": 2000,
                                                            "width": 2000,
                                                            "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_LASONATA_-A1_34b72673-551e-4ca8-b3ce-d427b123686f.jpg?v=1644800971"
                                                        },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_LASONATA_-A1_34b72673-551e-4ca8-b3ce-d427b123686f.jpg?v=1644800971",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577925591155,
                                                        "position": 11,
                                                        "preview_image": {
                                                            "aspect_ratio": 1.0,
                                                            "height": 2000,
                                                            "width": 2000,
                                                            "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_LASONATA_-A2_eb7f43c2-499d-4fa2-b1ed-026d761d75fc.jpg?v=1644800970"
                                                        },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_LASONATA_-A2_eb7f43c2-499d-4fa2-b1ed-026d761d75fc.jpg?v=1644800970",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577925623923,
                                                        "position": 12,
                                                        "preview_image": {
                                                            "aspect_ratio": 1.0,
                                                            "height": 2000,
                                                            "width": 2000,
                                                            "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_PYGMALION_-A1_e5b7c0be-25da-4dcb-9d42-a366ee47cbe6.jpg?v=1644800971"
                                                        },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_PYGMALION_-A1_e5b7c0be-25da-4dcb-9d42-a366ee47cbe6.jpg?v=1644800971",
                                                        "width": 2000
                                                    },
                                                    {
                                                        "alt": null,
                                                        "id": 21577925656691,
                                                        "position": 13,
                                                        "preview_image": {
                                                            "aspect_ratio": 1.0,
                                                            "height": 2000,
                                                            "width": 2000,
                                                            "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_PYGMALION_-A2_3508a0ce-1ce9-4378-88e8-87d4222648c1.jpg?v=1644800971"
                                                        },
                                                        "aspect_ratio": 1.0,
                                                        "height": 2000,
                                                        "media_type": "image",
                                                        "src": "https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/products\/STCLXMOCCA_PYGMALION_-A2_3508a0ce-1ce9-4378-88e8-87d4222648c1.jpg?v=1644800971",
                                                        "width": 2000
                                                    }
                                                ],
                                                "content": "\u003cp\u003eSpesial box set StayCool x Mocca dengan jumlah terbatas bisa kamu dapatkan untuk melengkapi koleksi merch official Mocca, Berisi 2 seri kaos kaki dan 1 Masker reusable edisi Mocca yang terbatas. Untuk februari yang penuh arti, jadikan box set StayCool x Mocca untuk melengkapi koleksi pribadi dan juga hadiah untuk orang yang kamu sayangi.\u003c\/p\u003e\n\u003cp\u003eUntuk februari yang penuh arti, jadikan box set StayCool x Mocca untuk melengkapi koleksi pribadi dan juga hadiah untuk orang yang kamu sayangi.\u003c\/p\u003e\n\u003ch5 data-mce-fragment=\"1\"\u003eDetail\u003c\/h5\u003e\n\u003cp data-mce-fragment=\"1\"\u003e\u003cstrong\u003eMaterials :\u003c\/strong\u003e\u003c\/p\u003e\n\u003cp data-mce-fragment=\"1\"\u003e- 85% Spun polyster\u003c\/p\u003e\n\u003cp data-mce-fragment=\"1\"\u003e-\u003cspan\u003e \u003c\/span\u003e10% Spandek\u003c\/p\u003e\n\u003cp data-mce-fragment=\"1\"\u003e-\u003cspan\u003e \u003c\/span\u003e5% Elastic\u003c\/p\u003e\n\u003cp data-mce-fragment=\"1\"\u003e \u003c\/p\u003e\n\u003cp data-mce-fragment=\"1\"\u003e\u003cstrong\u003eSize Chart :\u003c\/strong\u003e\u003c\/p\u003e\n\u003cdiv\u003e\u003cimg src=\"https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/files\/StayCool_Size_Chart_Men_82a44cd0-6c94-4c7c-8f7c-0ae063d30268.jpg?v=1636786920\" data-mce-src=\"https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/files\/StayCool_Size_Chart_Men_82a44cd0-6c94-4c7c-8f7c-0ae063d30268.jpg?v=1636786920\"\u003e\u003c\/div\u003e\n\u003cp\u003e\u003cimg alt=\"\" src=\"https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/files\/Socks_Lengths_Crew_d4025538-ed1a-4ee7-bbd7-a8238896f9a3_480x480.jpg?v=1579573414\" data-mce-src=\"https:\/\/cdn.shopify.com\/s\/files\/1\/2854\/1776\/files\/Socks_Lengths_Crew_d4025538-ed1a-4ee7-bbd7-a8238896f9a3_480x480.jpg?v=1579573414\"\u003e\u003c\/p\u003e\n\u003cp\u003e\u003cstrong\u003eWashing Note :\u003c\/strong\u003e\u003c\/p\u003e\n\u003cp data-mce-fragment=\"1\"\u003eDapat dicuci dengan mesin cuci atau cuci tangan, disarankan cuci dengan air dingin, tidak dicampur dengan bahan yang mudah luntur dan biarkan kering di udara tanpa menggunakan mesin pengering.\u003cbr\u003e\u003c\/p\u003e\n\u003ch5 data-mce-fragment=\"1\" class=\"p1\"\u003eReturn Policy\u003c\/h5\u003e\n\u003cp class=\"p1\"\u003eKebijakan Pengembalian:\u003c\/p\u003e\n\u003cp class=\"p1\"\u003eMohon sertakan video pada saat unboxing untuk pengembalian produk cacat, kurang barang atau salah kirim dan infokan ke Customer Service StayCool di 0818-514-333 atau E-mail ke \u003ca href=\"mailto:%20info@staycoolsocks.com\" data-mce-href=\"mailto:%20info@staycoolsocks.com\"\u003e\u003cspan class=\"s1\"\u003einfo@staycoolsocks.com\u003c\/span\u003e\u003c\/a\u003e\u003c\/p\u003e\n\u003cp\u003e\u003cmeta charset=\"utf-8\"\u003e\u003cspan\u003eTemukan info lebih lanjut mengenai kebijakan pengembalian produk \u003c\/span\u003e\u003ca href=\"https:\/\/www.staycoolsocks.com\/pages\/refund-policy\" target=\"_blank\" data-mce-href=\"https:\/\/www.staycoolsocks.com\/pages\/refund-policy\"\u003edisini\u003c\/a\u003e\u003cspan\u003e.\u003c\/span\u003e\u003c\/p\u003e\n\u003cscript src=\"https:\/\/vht.lycra.com\/prod\" data-inv-vht-segment=\"general\" data-inv-vht-lang=\"en\" data-inv-vht-method=\"logo,text\" data-inv-vht-brand=\"lycrab2b\" async=\"\"\u003e\u003c\/script\u003e\n\u003cstyle type=\"text\/css\"\u003e\u003c!--\ntd {border: 1px solid #ccc;}br {mso-data-placement:same-cell;}\n--\u003e\u003c\/style\u003e"
                                            },
                                            "selected_variant_id": 39834973208691
                                        }
                                    </script>
                                    <div class="ProductMeta__Description">
                                        <div class="Rte">
                                            <div>
                                                {!! $product->description !!}
                                            </div>
                                            <h5 data-mce-fragment="1">Detail</h5>
                                            <p data-mce-fragment="1"><strong>Size Chart :</strong></p>
                                            <div style="margin: 5% 5%;">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Size</th>
                                                            <th>US – Men's</th>
                                                            <th>US – Women's</th>
                                                            <th>US – Kids's</th>
                                                            <th>UK</th>
                                                            <th>CM</th>
                                                            <th>EU</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($product->sizes as $item)
                                                            <tr>
                                                                <th>{{ $item->size_title }}</th>
                                                                @if ($item->charts->count() > 0)
                                                                    @foreach ($item->charts as $item_chart)
                                                                        <th>{{ $item_chart->size_value }}</th>
                                                                    @endforeach
                                                                @else
                                                                    <th>-</th>
                                                                    <th>-</th>
                                                                    <th>-</th>
                                                                    <th>-</th>
                                                                    <th>-</th>
                                                                    <th>-</th>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Product__ActionList hidden-pocket">
                                <div class="Product__ActionItem hidden-lap-and-up">
                                    <button class="RoundButton RoundButton--small RoundButton--flat" data-action="open-product-zoom">
                                        <svg class="Icon Icon--plus" role="presentation" viewBox="0 0 16 16">
                                            <g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square">
                                                <path d="M8,1 L8,15"></path>
                                                <path d="M1,8 L15,8"></path>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <style>
                    /* This is a bit hacky but allows to circumvent the complete independency of section (as next section included in the page does not know anything about this page) */

                    @media screen and (max-width: 640px) {
                        #shopify-section-product-template + .shopify-section--bordered {
                            border-top: 0;
                        }

                        #shopify-section-product-template + .shopify-section--bordered > .Section {
                            padding-top: 0;
                        }
                    }
                </style>
                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                    <!-- Background of PhotoSwipe -->
                    <div class="pswp__bg"></div>

                    <!-- Slides wrapper with overflow:hidden. -->
                    <div class="pswp__scroll-wrap">
                        <!-- Container that holds slides. Do not remove as content is dynamically added -->
                        <div class="pswp__container">
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                            <div class="pswp__item"></div>
                        </div>

                        <!-- Main UI bar -->
                        <div class="pswp__ui pswp__ui--hidden">
                            <button class="pswp__button pswp__button--prev RoundButton" data-animate-left title="Previous (left arrow)">
                                <svg class="Icon Icon--arrow-left" role="presentation" viewBox="0 0 11 21">
                                    <polyline fill="none" stroke="currentColor" points="10.5 0.5 0.5 10.5 10.5 20.5" stroke-width="1.25"></polyline>
                                </svg>
                            </button>
                            <button class="pswp__button pswp__button--close RoundButton RoundButton--large" data-animate-bottom title="Close (Esc)">
                                <svg class="Icon Icon--close" role="presentation" viewBox="0 0 16 14">
                                    <path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
                                </svg>
                            </button>
                            <button class="pswp__button pswp__button--next RoundButton" data-animate-right title="Next (right arrow)">
                                <svg class="Icon Icon--arrow-right" role="presentation" viewBox="0 0 11 21">
                                    <polyline fill="none" stroke="currentColor" points="0.5 0.5 10.5 10.5 0.5 20.5" stroke-width="1.25"></polyline>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="shopify-section-1596077408308" class="shopify-section shopify-section--bordered">
                <section
                    class="Section Section--spacingNormal"
                    data-section-id="1596077408308"
                    data-section-type="featured-collections"
                    data-settings='{
                    "layout": "carousel"
                  }'
                >
                    <header class="SectionHeader SectionHeader--center">
                        <div class="Container"><h2 class="SectionHeader__Heading Heading u-h1">BEST SELLERS</h2></div>
                    </header>
                    <div class="TabPanel" id="block-1596077408308-0" aria-hidden="false" role="tabpanel">
                        <div class="ProductListWrapper">
                            <div
                                class="ProductList ProductList--carousel Carousel"
                                data-flickity-config='{
                                "prevNextButtons": true,
                                "pageDots": false,
                                "wrapAround": false,
                                "contain": true,
                                "cellAlign": "center",
                                "watchCSS": true,
                                "dragThreshold": 8,
                                "groupCells": true,
                                "arrowShape": {"x0": 20, "x1": 60, "y1": 40, "x2": 60, "y2": 35, "x3": 25}
                              }'
                            >
                            @livewire('best-sellers')
                            </div>
                        </div>
                        <div class="Container">
                            <div class="SectionFooter">
                                <a href="/collections/cool-masks" class="Button Button--primary">SEE MORE</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div id="shopify-section-recently-viewed-products" class="shopify-section shopify-section--bordered shopify-section--hidden">
                <section
                    class="Section Section--spacingNormal"
                    data-section-id="recently-viewed-products"
                    data-section-type="recently-viewed-products"
                    data-section-settings='{
                      "productId": 6761452961907
                    }'
                >
                    <header class="SectionHeader SectionHeader--center">
                        <div class="Container">
                            <h3 class="SectionHeader__Heading Heading u-h3">Recently viewed</h3>
                        </div>
                    </header>
                </section>
            </div>
        </main>

        @include('partials.layout.footer')

        @include('partials.layout.script')
    </body>
</html>
