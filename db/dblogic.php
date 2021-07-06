<?php
const servername = "localhost";
const username = "root";
const password = "root";
const dbname = "mydb";

function connectDb()
{
    static $connect;
    var_dump($connect);
    if (null === $connect) {
        $connect = mysqli_connect(servername, username, password, dbname) or die('Connection Error');
    }
    mysqli_query($connect, "
    /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
    /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
    /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
    /*!50503 SET NAMES utf8 */;
    /*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
    /*!40103 SET TIME_ZONE='+00:00' */;
    /*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
    /*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
    /*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
    /*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
    
    --
    -- Table structure for table `colors`
    --
    
    DROP TABLE IF EXISTS `colors`;
    /*!40101 SET @saved_cs_client     = @@character_set_client */;
    /*!50503 SET character_set_client = utf8mb4 */;
    CREATE TABLE `colors` (
      `id` int NOT NULL AUTO_INCREMENT,
      `hex` varchar(45) NOT NULL,
      `description` varchar(45) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
    /*!40101 SET character_set_client = @saved_cs_client */;
    
    --
    -- Dumping data for table `colors`
    --
    
    LOCK TABLES `colors` WRITE;
    /*!40000 ALTER TABLE `colors` DISABLE KEYS */;
    INSERT INTO `colors` VALUES (3,'#98FB98','Зеленый'),(4,'#E8145F','Красный'),(5,'#0B63B2','Синий');
    /*!40000 ALTER TABLE `colors` ENABLE KEYS */;
    UNLOCK TABLES;
    
    --
    -- Table structure for table `groups`
    --
    
    DROP TABLE IF EXISTS `groups`;
    /*!40101 SET @saved_cs_client     = @@character_set_client */;
    /*!50503 SET character_set_client = utf8mb4 */;
    CREATE TABLE `groups` (
      `id` int NOT NULL AUTO_INCREMENT,
      `name` varchar(145) NOT NULL,
      `description` varchar(145) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
    /*!40101 SET character_set_client = @saved_cs_client */;
    
    --
    -- Dumping data for table `groups`
    --
    
    LOCK TABLES `groups` WRITE;
    /*!40000 ALTER TABLE `groups` DISABLE KEYS */;
    INSERT INTO `groups` VALUES (1,'Админы',NULL),(2,'Обычные пользователи',NULL),(3,'Привелегированные',NULL);
    /*!40000 ALTER TABLE `groups` ENABLE KEYS */;
    UNLOCK TABLES;
    
    --
    -- Table structure for table `messages`
    --
    
    DROP TABLE IF EXISTS `messages`;
    /*!40101 SET @saved_cs_client     = @@character_set_client */;
    /*!50503 SET character_set_client = utf8mb4 */;
    CREATE TABLE `messages` (
      `id` int NOT NULL AUTO_INCREMENT,
      `text` text NOT NULL,
      `title` text NOT NULL,
      `date_create` datetime NOT NULL,
      `subgroup_id` int DEFAULT NULL,
      `user_recipient` int NOT NULL,
      `user_creator_id` int NOT NULL,
      PRIMARY KEY (`id`),
      KEY `fk_messages_users1_idx` (`user_creator_id`),
      CONSTRAINT `fk_messages_users1` FOREIGN KEY (`user_creator_id`) REFERENCES `users` (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    /*!40101 SET character_set_client = @saved_cs_client */;
    
    --
    -- Dumping data for table `messages`
    --
    
    LOCK TABLES `messages` WRITE;
    /*!40000 ALTER TABLE `messages` DISABLE KEYS */;
    /*!40000 ALTER TABLE `messages` ENABLE KEYS */;
    UNLOCK TABLES;
    
    --
    -- Table structure for table `sections`
    --
    
    DROP TABLE IF EXISTS `sections`;
    /*!40101 SET @saved_cs_client     = @@character_set_client */;
    /*!50503 SET character_set_client = utf8mb4 */;
    CREATE TABLE `sections` (
      `id` int NOT NULL AUTO_INCREMENT,
      `name` varchar(145) NOT NULL,
      `color_id` int NOT NULL,
      `date_create` datetime NOT NULL,
      `user_id` int NOT NULL,
      `parent_id` int DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `fk_messages_groups_users1_idx` (`user_id`),
      KEY `fk_messages_groups_colors1` (`color_id`),
      CONSTRAINT `fk_messages_groups_colors1` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
      CONSTRAINT `fk_messages_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
    /*!40101 SET character_set_client = @saved_cs_client */;
    
    --
    -- Dumping data for table `sections`
    --
    
    LOCK TABLES `sections` WRITE;
    /*!40000 ALTER TABLE `sections` DISABLE KEYS */;
    INSERT INTO `sections` VALUES (6,'Основные',3,'2021-07-05 21:07:13',1,NULL),(7,'Оповещания',5,'2021-07-05 21:07:53',1,NULL),(8,'Спам',4,'2021-07-05 21:08:05',1,NULL),(9,'По работе',3,'2021-07-05 21:08:24',1,NULL),(10,'Личные',3,'2021-07-05 21:08:31',1,NULL),(11,'Форумы',5,'2021-07-05 21:08:41',1,NULL),(12,'Магазины',5,'2021-07-05 21:08:51',1,NULL),(13,'Подписки',5,'2021-07-05 21:09:00',1,NULL);
    /*!40000 ALTER TABLE `sections` ENABLE KEYS */;
    UNLOCK TABLES;
    
    --
    -- Table structure for table `users`
    --
    
    DROP TABLE IF EXISTS `users`;
    /*!40101 SET @saved_cs_client     = @@character_set_client */;
    /*!50503 SET character_set_client = utf8mb4 */;
    CREATE TABLE `users` (
      `id` int NOT NULL AUTO_INCREMENT,
      `full_name` varchar(255) NOT NULL,
      `flag_active` bit(1) NOT NULL,
      `email` varchar(245) NOT NULL,
      `password` varchar(60) NOT NULL,
      `flag_consent` bit(1) NOT NULL,
      `phone` varchar(45) NOT NULL,
      `login` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
    /*!40101 SET character_set_client = @saved_cs_client */;
    
    --
    -- Dumping data for table `users`
    --
    
    LOCK TABLES `users` WRITE;
    /*!40000 ALTER TABLE `users` DISABLE KEYS */;
    INSERT INTO `users` VALUES (1,'Гура Илья',_binary '\0','mail@mail.com','$2y$10$9QZySDRQnOLK934JLt6T.Oag7OYRi8GIcOTaDuRbmbdYLbNWMqvF.',_binary '\0','89511872612','ilya'),(2,'Пользователь №1',_binary '','test@mail.com','$2y$10$9QZySDRQnOLK934JLt6T.Oag7OYRi8GIcOTaDuRbmbdYLbNWMqvF.',_binary '','8947162763','user');
    /*!40000 ALTER TABLE `users` ENABLE KEYS */;
    UNLOCK TABLES;
    
    --
    -- Table structure for table `users_has_groups`
    --
    
    DROP TABLE IF EXISTS `users_has_groups`;
    /*!40101 SET @saved_cs_client     = @@character_set_client */;
    /*!50503 SET character_set_client = utf8mb4 */;
    CREATE TABLE `users_has_groups` (
      `user_id` int NOT NULL,
      `group_id` int NOT NULL,
      `id` int NOT NULL AUTO_INCREMENT,
      PRIMARY KEY (`id`,`group_id`,`user_id`),
      KEY `fk_users_has_groups_groups1_idx` (`group_id`),
      KEY `fk_users_has_groups_users_idx` (`user_id`),
      CONSTRAINT `fk_users_has_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
      CONSTRAINT `fk_users_has_groups_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
    /*!40101 SET character_set_client = @saved_cs_client */;
    
    --
    -- Dumping data for table `users_has_groups`
    --
    
    LOCK TABLES `users_has_groups` WRITE;
    /*!40000 ALTER TABLE `users_has_groups` DISABLE KEYS */;
    INSERT INTO `users_has_groups` VALUES (1,1,1),(1,2,2),(2,3,3);
    /*!40000 ALTER TABLE `users_has_groups` ENABLE KEYS */;
    UNLOCK TABLES;
    /*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
    
    /*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
    /*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
    /*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
    /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
    /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
    /*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
    
    -- Dump completed on 2021-07-06 21:01:59
    ");
    return $connect;
}

function getUsersInfo()
{
    $connect = connectDb();
    $result = mysqli_query($connect, "select * from users");
    mysqli_close($connect);
    return $result;
}

function getUserByLogin($login, $password)
{
    $connect = connectDb();
    $login = mysqli_real_escape_string($connect, $login);
    $result = mysqli_query($connect, "select * from users u where u.login = '$login' limit 1");
    $passwordBD = '';
    $user = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $user = $row;
        $passwordBD = $row['password'];
    }
    mysqli_close($connect);
    if (password_verify($password, $passwordBD)) {
        return $user;
    }
}

function getGroups($userId)
{
    $connect = connectDb();
    $userId = mysqli_real_escape_string($connect, $userId);
    $result = mysqli_query($connect, "
        select distinct uhg.group_id, g.name from users u
        inner join users_has_groups uhg on $userId = uhg.user_id
        inner join `groups` g on uhg.group_id = g.id
");
    mysqli_close($connect);
    return $result;
}