CREATE TABLE `hostel` (
  `hostelId` INT PRIMARY KEY NOT NULL,
  `hostelName` VARCHAR(255) NOT NULL,
  `gender` ENUM ('Boys', 'Girls') NOT NULL,
  `contactInfo` VARCHAR(15) NOT NULL,
  `createdAt` TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `room` (
  `roomId` INT PRIMARY KEY AUTO_INCREMENT,
  `roomNumber` VARCHAR(10) NOT NULL,
  `capacity` INT NOT NULL,
  `type` ENUM ('Attached', 'Not Attached') NOT NULL,
  `hostelId` INT NOT NULL
);

CREATE TABLE `hostelIncharge` (
  `id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `hostelId` INT(11) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `position` VARCHAR(255) NOT NULL,
  `contact` VARCHAR(20) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `remarks` TEXT,
  `dateAssigned` DATE NOT NULL,
  `createdAt` TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `student` (
  `studentId` INT PRIMARY KEY AUTO_INCREMENT,
  `studentName` VARCHAR(50) NOT NULL,
  `rollNumber` VARCHAR(10) UNIQUE NOT NULL,
  `branch` VARCHAR(50) NOT NULL,
  `course` VARCHAR(50) NOT NULL,
  `year` INT NOT NULL,
  `parentName` VARCHAR(50) NOT NULL,
  `parentContact` VARCHAR(20) NOT NULL,
  `parentAddress` TEXT NOT NULL,
  `studentMobile` VARCHAR(20) NOT NULL,
  `studentEmail` VARCHAR(50) NOT NULL,
  `residentialAddress` TEXT NOT NULL,
  `bankName` VARCHAR(50) NOT NULL,
  `bankBranch` VARCHAR(50) NOT NULL,
  `bankIFSC` VARCHAR(20) NOT NULL,
  `bankAccountHolderName` VARCHAR(50) NOT NULL,
  `bankAccountNumber` VARCHAR(50) NOT NULL,
  `medicalInfo` TEXT,
  `roomNumber` INT,
  `checkInDate` DATE,
  `checkOutDate` DATE,
  `useIronBox` ENUM ('Yes', 'No') DEFAULT "No",
  `useComputer` ENUM ('Yes', 'No') DEFAULT "No",
  `localGuardianName` VARCHAR(50),
  `localGuardianContact` VARCHAR(20),
  `localGuardianAddress` TEXT,
  `studentImage` BLOB,
  `dateOfBirth` DATE,
  `bloodGroup` VARCHAR(5)
);

CREATE TABLE `complaint` (
  `complaintId` INT PRIMARY KEY AUTO_INCREMENT,
  `studentId` INT NOT NULL,
  `complaintType` VARCHAR(255) NOT NULL,
  `complaintDescription` TEXT NOT NULL,
  `complaintDate` TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `complaintResolution` (
  `complaintId` INT PRIMARY KEY NOT NULL,
  `staffId` INT NOT NULL,
  `actionTaken` TEXT NOT NULL,
  `remarks` TEXT,
  `resolutionDate` TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `staff` (
  `staffId` INT AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `contact` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `gender` ENUM ('Male', 'Female') NOT NULL,
  `staff_designation` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP)
);

ALTER TABLE `room` ADD FOREIGN KEY (`hostelId`) REFERENCES `hostel` (`hostelId`);

ALTER TABLE `hostelIncharge` ADD FOREIGN KEY (`hostelId`) REFERENCES `hostel` (`hostelId`) ON DELETE CASCADE;

ALTER TABLE `student` ADD FOREIGN KEY (`roomNumber`) REFERENCES `room` (`roomNumber`) ON DELETE SET NULL;

ALTER TABLE `complaint` ADD FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`);

ALTER TABLE `complaintResolution` ADD FOREIGN KEY (`complaintId`) REFERENCES `complaint` (`complaintId`);

ALTER TABLE `complaintResolution` ADD FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`);
