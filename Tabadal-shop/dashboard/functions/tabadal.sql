    --
    -- Database: `Tabadal`
    --

    -- --------------------------------------------------------

    --
    -- Table structure for table `brand`
    --

    CREATE TABLE `brand` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `price` int(11) NOT NULL,
    `sale` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `description` varchar(255) NOT NULL,
    `img` varchar(255) NOT NULL,
    `brand_id` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    -- --------------------------------------------------------

    --
    -- Table structure for table `brands`
    --

    CREATE TABLE `brands` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    -- --------------------------------------------------------

    --
    -- Table structure for table `cart`
    --

    CREATE TABLE `cart` (
    `id` int(11) NOT NULL,
    `userId` int(11) NOT NULL,
    `productId` int(11) NOT NULL,
    `quantity` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    --
    -- Dumping data for table `cart`
    --

    INSERT INTO `cart` (`id`, `userId`, `productId`, `quantity`) VALUES
    (7, 3, 14, 7),
    (8, 3, 16, 10),
    (10, 15, 14, 24),
    (11, 15, 14, 30),
    (12, 19, 14, 23),
    (13, 21, 14, 6),
    (14, 21, 7, 5),
    (15, 21, 17, 14),
    (16, 27, 25, 8),
    (23, 27, 32, 1),
    (24, 27, 32, 1),
    (37, 29, 33, 1),
    (38, 29, 37, 1),
    (39, 29, 33, 1),
    (41, 29, 33, 1),
    (42, 29, 33, 1),
    (51, 33, 59, 11);

    -- --------------------------------------------------------

    --
    -- Table structure for table `category`
    --

    CREATE TABLE `category` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `parent` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    --
    -- Dumping data for table `category`
    --

    INSERT INTO `category` (`id`, `name`, `parent`) VALUES
    (15, 'CLOTHES', 0),
    (16, 'SHOES', 0),
    (17, 'WATCHES', 0),
    (18, 'ELECTRONICS', 0),
    (19, 'cycle', 0),
    (20, 'laptop', 0);

    -- --------------------------------------------------------

    --
    -- Table structure for table `city`
    --

    CREATE TABLE `city` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `adders` varchar(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    --
    -- Dumping data for table `city`
    --

    INSERT INTO `city` (`id`, `name`, `adders`) VALUES
    (1, 'القاهرة', ''),
    (2, 'الجيزة', ''),
    (8, 'القليوبية', ''),
    (9, 'الأسكندرية', ''),
    (10, 'الغربيه', ''),
    (11, 'الشرقية', ''),
    (12, 'الدقهليه', ''),
    (13, 'الاسماعلية', ''),
    (14, 'السويس', ''),
    (15, 'بورسعيد', ''),
    (16, 'دمياط', ''),
    (17, 'كفرالشيخ', ''),
    (18, 'شمال سيناء', ''),
    (19, 'جنوب سيناء', ''),
    (20, 'الوادي الجديد', ''),
    (21, 'البحر الاحمر', ''),
    (22, 'قنا', ''),
    (23, 'أسيوط', ''),
    (24, 'سوهاح', ''),
    (25, 'بني سويف', ''),
    (26, 'المنيا', ''),
    (27, 'أسوان', ''),
    (28, 'طنطا', ''),
    (29, 'جنوب الوادي', '');

    -- --------------------------------------------------------

    --
    -- Table structure for table `images`
    --

    CREATE TABLE `images` (
    `id` int(11) NOT NULL,
    `productId` int(11) NOT NULL,
    `name` varchar(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    -- --------------------------------------------------------

    --
    -- Table structure for table `messages`
    --

    CREATE TABLE `messages` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `content` text NOT NULL,
    `viewed` tinyint(1) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    -- --------------------------------------------------------

    --
    -- Table structure for table `privileges`
    --

    CREATE TABLE `privileges` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    --
    -- Dumping data for table `privileges`
    --

    INSERT INTO `privileges` (`id`, `name`) VALUES
    (1, 'customer'),
    (2, 'supervisor'),
    (3, 'admin'),
    (4, 'owner');

    -- --------------------------------------------------------

    --
    -- Table structure for table `products`
    --

    CREATE TABLE `products` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `price` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `description` varchar(255) NOT NULL,
    `category_id` int(11) NOT NULL,
    `img` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `email` varchar(50) NOT NULL,
    `number` int(50) NOT NULL,
    `date` date NOT NULL,
    `city_id` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    --
    -- Dumping data for table `products`
    --

    INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `description`, `category_id`, `img`, `username`, `email`, `number`, `date`, `city_id`) VALUES
    (78, 'Watch Clock', 400, 1, 'Watch Clock ', 17, 'd47a72c4238a0fdc9925ee9843d0630f.jpg,1fe7596dfa085bd9cee683ba6013462b.jpg,aeaad6bcd382067ba083971b5641a8c6.jpg', 'Yahya Ali', 'yahyatahaa1@gmail.com', 1023800994, '2023-03-26', 12),
    (80, 'Watch Clock', 400, 1, 'WATCHES', 17, 'def236f3393d9bddc76098bf1d6be200.jpg,1906571d91c5ce67cf71ada543fbafca.jpg,7b6718bbe1ad06eb8b72e507a2812e51.jpg', 'Yahya Ali', 'yahyatahaa1@gmail.com', 1023800994, '2023-03-26', 12),
    (81, 'Watch Clock', 400, 1, '                              rhtjty          ', 16, 'fa2a95091321f9d12b2f8e8ccc921a9d.jpg,745f42471f65ff7f4da6b8bdf19ba548.jpg,3a7839f1af2cf4e2a1769dc0adfbf2a8.jpg', 'Yahya Ali', 'yahyatahaa1@gmail.com', 1023800994, '2023-03-26', 2);

    -- --------------------------------------------------------

    --
    -- Table structure for table `slider`
    --

    CREATE TABLE `slider` (
    `id` int(11) DEFAULT NULL,
    `img` varchar(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    --
    -- Dumping data for table `slider`
    --

    INSERT INTO `slider` (`id`, `img`) VALUES
    (NULL, '708f8a580e15886cddbf39bbaba15ff7.jpg'),
    (NULL, 'e30010e3b4eb91c7c6b5b48d6cd9d51f.jpg'),
    (NULL, '6c614a54a021b852248e2d4c33a8cce5.jpg');

    -- --------------------------------------------------------

    --
    -- Table structure for table `users`
    --

    CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `username` varchar(255) NOT NULL,
    `email` varchar(50) NOT NULL,
    `number` int(50) NOT NULL,
    `message` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `usertype` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    --
    -- Dumping data for table `users`
    --

    INSERT INTO `users` (`id`, `username`, `email`, `number`, `message`, `password`, `usertype`) VALUES
    (1, 'owner', '', 0, '', '8e34cd6bedab9f18eb47b6772d16dc95', 4),
    (33, 'Yahya Ali', 'yahyatahaa1@gmail.com', 1023800994, '', '8a15f1e163a53f99c3e2c75b1641f379', 1),
    (35, 'Ahmed', 'ahmed@gmail.com', 1023800994, '', '6d071901727aec1ba6d8e2497ef5b709', 1);

    --
    -- Indexes for dumped tables
    --

    --
    -- Indexes for table `brand`
    --
    ALTER TABLE `brand`
    ADD PRIMARY KEY (`id`),
    ADD KEY `brand_id` (`brand_id`);

    --
    -- Indexes for table `brands`
    --
    ALTER TABLE `brands`
    ADD PRIMARY KEY (`id`);

    --
    -- Indexes for table `cart`
    --
    ALTER TABLE `cart`
    ADD PRIMARY KEY (`id`);

    --
    -- Indexes for table `category`
    --
    ALTER TABLE `category`
    ADD PRIMARY KEY (`id`);

    --
    -- Indexes for table `city`
    --
    ALTER TABLE `city`
    ADD PRIMARY KEY (`id`);

    --
    -- Indexes for table `images`
    --
    ALTER TABLE `images`
    ADD PRIMARY KEY (`id`);

    --
    -- Indexes for table `messages`
    --
    ALTER TABLE `messages`
    ADD PRIMARY KEY (`id`);

    --
    -- Indexes for table `privileges`
    --
    ALTER TABLE `privileges`
    ADD PRIMARY KEY (`id`);

    --
    -- Indexes for table `products`
    --
    ALTER TABLE `products`
    ADD PRIMARY KEY (`id`),
    ADD KEY `city_id` (`city_id`);

    --
    -- Indexes for table `users`
    --
    ALTER TABLE `users`
    ADD PRIMARY KEY (`id`);

    --
    -- AUTO_INCREMENT for dumped tables
    --

    --
    -- AUTO_INCREMENT for table `brand`
    --
    ALTER TABLE `brand`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

    --
    -- AUTO_INCREMENT for table `brands`
    --
    ALTER TABLE `brands`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

    --
    -- AUTO_INCREMENT for table `cart`
    --
    ALTER TABLE `cart`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

    --
    -- AUTO_INCREMENT for table `category`
    --
    ALTER TABLE `category`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

    --
    -- AUTO_INCREMENT for table `city`
    --
    ALTER TABLE `city`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

    --
    -- AUTO_INCREMENT for table `images`
    --
    ALTER TABLE `images`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

    --
    -- AUTO_INCREMENT for table `messages`
    --
    ALTER TABLE `messages`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

    --
    -- AUTO_INCREMENT for table `privileges`
    --
    ALTER TABLE `privileges`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

    --
    -- AUTO_INCREMENT for table `products`
    --
    ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

    --
    -- AUTO_INCREMENT for table `users`
    --
    ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

    --
    -- Constraints for dumped tables
    --

    --
    -- Constraints for table `brand`
    --
    ALTER TABLE `brand`
    ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

    --
    -- Constraints for table `products`
    --
    ALTER TABLE `products`
    ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);
    COMMIT;
