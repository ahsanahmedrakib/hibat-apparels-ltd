<?php

return [

    'name' => 'Hibat Apparels Ltd.',
    'short_name' => 'HAL',
    'tagline' => 'Work together, Win together...',
    'description' => 'Hibat Apparels Ltd. is a Bangladesh-based apparel manufacturer and exporter of functional outerwear, workwear, uniforms, denim, twill and knitwear for global brands.',
    'email' => 'info@hibatapparels.com',
    'hours' => 'Saturday - Thursday: 10AM - 7PM (UTC +06:00)',

    'socials' => [
        ['name' => 'Facebook', 'icon' => 'facebook', 'url' => '#'],
        ['name' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['name' => 'LinkedIn', 'icon' => 'linkedin', 'url' => '#'],
    ],

    'hero_slides' => [
        [
            'eyebrow' => 'Building a sustainable supply chain',
            'title_lines' => [
                ['text' => 'Your reliable partner for', 'class' => 'block text-base sm:text-lg lg:text-xl font-medium normal-case tracking-normal text-brand-200'],
                ['text' => 'Fashion, Sport', 'class' => 'block'],
                ['text' => '& Outdoor Clothing.', 'class' => 'block text-brand-300'],
            ],
            'description' => 'From the first sketch to the final shipment, Hibat Apparels Ltd. delivers dependable apparel programmes with in-house manufacturing, certified compliance and a partner-first mindset.',
            'image' => 'images/about/sustainability.jpg',
        ],
        [
            'eyebrow' => 'Sustainable apparel for a better world',
            'title_lines' => [
                ['text' => 'Functional outerwear,', 'class' => 'block'],
                ['text' => 'workwear', 'class' => 'block text-brand-300'],
                ['text' => '& uniforms.', 'class' => 'block'],
            ],
            'description' => 'Technical garments engineered for hunting, active sport and hard-working teams - built to perform in the field, on site and every day.',
            'image' => 'images/about/factory.jpg',
        ],
        [
            'eyebrow' => 'Owned factory. Global reach.',
            'title_lines' => [
                ['text' => 'Designed in', 'class' => 'block'],
                ['text' => 'Bangladesh,', 'class' => 'block text-brand-300'],
                ['text' => 'delivered worldwide.', 'class' => 'block'],
            ],
            'description' => 'With offices in Dhaka and San Jose and an owned factory in Gazipur, we keep design, production, quality and logistics close to you.',
            'image' => 'images/about/quality.jpg',
        ],
    ],

    'stats' => [
        ['value' => 10, 'suffix' => '', 'label' => 'Product categories'],
        ['value' => 3, 'suffix' => '', 'label' => 'Global offices'],
        ['value' => 6, 'suffix' => '', 'label' => 'Certifications'],
        ['value' => 100, 'suffix' => '%', 'label' => 'Quality checked'],
    ],

    'products' => [
        [
            'slug' => 'functional-outerwear',
            'name' => 'Functional Outerwear',
            'icon' => 'outerwear',
            'image' => 'images/products/functional-outerwear.jpg',
            'summary' => 'Technical outerwear built for the field, the trail and the training ground - engineered for movement, weather and performance.',
            'children' => ['Hunting Dress', 'Active Wear', 'Sports Wear'],
            'highlights' => ['Weather-resistant fabrics', 'Ergonomic construction', 'Performance finishes'],
        ],
        [
            'slug' => 'workwear',
            'name' => 'Workwear',
            'icon' => 'workwear',
            'image' => 'images/products/workwear.jpg',
            'summary' => 'Hard-wearing workwear that keeps teams comfortable, visible and safe through long shifts and tough conditions.',
            'children' => [],
            'highlights' => ['Reinforced seams', 'Durable twill & canvas', 'Custom branding'],
        ],
        [
            'slug' => 'uniforms',
            'name' => 'Uniforms',
            'icon' => 'uniform',
            'image' => 'images/products/uniforms.jpg',
            'summary' => 'Precision-made defence and medical uniforms that balance discipline, comfort and everyday practicality.',
            'children' => ['Defence Uniforms', 'Medical Uniforms'],
            'highlights' => ['Spec-accurate detailing', 'Colour-fast fabrics', 'Bulk consistency'],
        ],
        [
            'slug' => 'jackets',
            'name' => 'Jackets',
            'icon' => 'jacket',
            'image' => 'images/products/jackets.jpg',
            'summary' => 'Layered protection for every season - from lightweight shells to insulated outdoor jackets.',
            'children' => [],
            'highlights' => ['Technical shells', 'Insulated options', 'Water-repellent finishes'],
        ],
        [
            'slug' => 'denim',
            'name' => 'Denim',
            'icon' => 'denim',
            'image' => 'images/products/denim.jpg',
            'summary' => 'Classic denim reimagined with modern fits, dependable washes and consistent quality at scale.',
            'children' => ['Long Pant', 'Shirts', 'Jackets', 'Denim Shorts'],
            'highlights' => ['Rigid & stretch denim', 'Consistent washes', 'Full size ranges'],
        ],
        [
            'slug' => 'twill',
            'name' => 'Twill',
            'icon' => 'twill',
            'image' => 'images/products/twill.jpg',
            'summary' => 'Versatile twill programmes covering chinos, cargos and joggers for work, outdoor and everyday wear.',
            'children' => ['Chino Long', 'Chino Shorts', 'Cargo', 'Joggers'],
            'highlights' => ['Cotton-rich twill', 'Garment dyeing', 'Comfort stretch'],
        ],
        [
            'slug' => 'knit-wear',
            'name' => 'Knit Wear',
            'icon' => 'knit',
            'image' => 'images/products/knitwear.jpg',
            'summary' => 'Soft, breathable knitwear for retail and promotional programmes - made to feel as good as it looks.',
            'children' => ['T-Shirt', 'Polo', 'Hoodie'],
            'highlights' => ['Single & double jersey', 'Fleece & terry', 'Custom prints & embroidery'],
        ],
        [
            'slug' => 'socks',
            'name' => 'Socks',
            'icon' => 'sock',
            'image' => 'images/products/socks.jpg',
            'summary' => 'Performance and everyday socks with reliable stretch, cushioning and colour retention.',
            'children' => [],
            'highlights' => ['Cushioned soles', 'Ribbed cuffs', 'Bulk packaging'],
        ],
        [
            'slug' => 'backpacks',
            'name' => 'Backpacks',
            'icon' => 'backpack',
            'image' => 'images/products/backpacks.jpg',
            'summary' => 'Functional backpacks for work, travel and outdoor use - designed around real-world carrying needs.',
            'children' => [],
            'highlights' => ['Durable textiles', 'Ergonomic straps', 'Utility compartments'],
        ],
        [
            'slug' => 'accessories',
            'name' => 'Accessories',
            'icon' => 'accessories',
            'image' => 'images/products/accessories.jpg',
            'summary' => 'The finishing touches that complete a collection - caps, belts, gloves and more.',
            'children' => [],
            'highlights' => ['Headwear & caps', 'Belts & gloves', 'Private-label ready'],
        ],
    ],

    'locations' => [
        [
            'slug' => 'corporate-office',
            'label' => 'Corporate Office',
            'city' => 'Dhaka',
            'country' => 'Bangladesh',
            'address' => 'House #08, Road #04/A, Sector #15/G, Uttara, Dhaka',
            'roles' => ['Head Office', 'Merchandising', 'Design & Development', 'Sourcing'],
            'map' => 'House 08, Road 04/A, Sector 15/G, Uttara, Dhaka, Bangladesh',
            'icon' => 'office',
            'note' => 'Our commercial and product development hub, close to Dhaka airport and the countrys leading fabric and trim markets.',
        ],
        [
            'slug' => 'factory',
            'label' => 'Factory',
            'city' => 'Tongi, Gazipur',
            'country' => 'Bangladesh',
            'address' => 'Leadtime Apparels Ltd, Gazipura 27, Tongi, Gazipur',
            'roles' => ['Production', 'Quality Control', 'Sample Room', 'Finishing & Packing'],
            'map' => 'Leadtime Apparels Ltd, Gazipura 27, Tongi, Gazipur, Bangladesh',
            'icon' => 'factory',
            'note' => 'Our owned production floor, where cutting, sewing, finishing and final inspection happen under one roof.',
        ],
        [
            'slug' => 'usa-office',
            'label' => 'USA Office',
            'city' => 'San Jose',
            'country' => 'California, USA',
            'address' => '1656 Camarena Pl, San Jose, CA 95121, California, USA',
            'roles' => ['Business Development', 'Client Support', 'Logistics Coordination'],
            'map' => '1656 Camarena Pl, San Jose, CA 95121, California, USA',
            'icon' => 'globe',
            'note' => 'Our North America touchpoint for sales, client service and shipment coordination across US time zones.',
        ],
    ],

    'certifications' => [
        ['name' => 'OEKO-TEX Standard 100', 'short' => 'OEKO-TEX'],
        ['name' => 'amfori BSCI', 'short' => 'BSCI'],
        ['name' => 'GOTS', 'short' => 'GOTS'],
        ['name' => 'SEDEX', 'short' => 'SEDEX'],
        ['name' => 'ISO 9001:2015', 'short' => 'ISO'],
        ['name' => 'BGBA', 'short' => 'BGBA'],
    ],

    'services' => [
        'Innovation and international know-how',
        'Customer support and expert advice on material selection',
        'Customised solutions and ongoing production monitoring',
        'Competent project management from acquisition to final delivery',
        'Immediate availability of a wide product range',
        'Global and reliable logistics',
        'Import handling and documentation',
        'Warehousing and centralised or decentralised delivery',
        'Excellent quality-price-performance ratio with in-house production',
    ],

    'process' => [
        [
            'title' => 'Brief & consultation',
            'description' => 'Share your concept, quantities and target price. We advise on fabrics, fits and feasibility.',
        ],
        [
            'title' => 'Design & sampling',
            'description' => 'Our team develops tech packs and delivers samples quickly for your approval.',
        ],
        [
            'title' => 'Sourcing & production',
            'description' => 'Approved materials move into our factory with clear timelines and live updates.',
        ],
        [
            'title' => 'Quality control',
            'description' => 'Inline and final inspections keep every order consistent with your standards.',
        ],
        [
            'title' => 'Logistics & delivery',
            'description' => 'We handle packing, documentation and shipping to your door, worldwide.',
        ],
    ],

    'why_us' => [
        [
            'icon' => 'factory',
            'title' => 'In-house factory',
            'description' => 'Our own production floor in Tongi, Gazipur gives you direct control over quality and lead times.',
        ],
        [
            'icon' => 'shield',
            'title' => 'Compliance-first',
            'description' => 'Certified partners and audited processes protect your brand at every stage.',
        ],
        [
            'icon' => 'layers',
            'title' => 'End-to-end service',
            'description' => 'Development, sampling, production, QC and logistics - handled under one roof.',
        ],
        [
            'icon' => 'globe',
            'title' => 'Global offices',
            'description' => 'Teams in Dhaka and San Jose keep you close to production and close to your market.',
        ],
        [
            'icon' => 'package',
            'title' => 'Flexible MOQs',
            'description' => 'Programmes sized for growing labels and established brands alike.',
        ],
        [
            'icon' => 'truck',
            'title' => 'On-time delivery',
            'description' => 'Realistic planning and transparent communication from sampling to shipment.',
        ],
    ],

    'values' => [
        [
            'icon' => 'target',
            'title' => 'Our mission',
            'description' => 'To make world-class apparel manufacturing simple, transparent and dependable for brands of every size.',
        ],
        [
            'icon' => 'globe',
            'title' => 'Our vision',
            'description' => 'To be the partner of choice for functional, work and lifestyle apparel made responsibly in Bangladesh.',
        ],
        [
            'icon' => 'handshake',
            'title' => 'Our promise',
            'description' => 'Work together, win together - honest communication, consistent quality and long-term relationships.',
        ],
    ],

    'contact_subjects' => [
        'General enquiry',
        'Request a quote',
        'Product development',
        'Partnership',
        'Career',
    ],

];
