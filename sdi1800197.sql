-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 23, 2022 at 07:51 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdi1800197`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ann_id` int NOT NULL,
  `type` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content` text NOT NULL,
  `time_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ann_id`, `type`, `title`, `content`, `time_uploaded`) VALUES
(2, '1', 'Δελτίο Τύπου – Συνοπτικός απολογισμός έτους 2021', '\r\n\r\nΣτα πλαίσια της αρχής της διαφάνειας και του σεβασμού του πολίτη με αφορμή τη συμπλήρωση του δεύτερου έτους της θητείας του ΔΣ του ΔΟΑΤΑΠ, ανακοινώνονται συνοπτικά στοιχεία απολογισμού του έτους 2021. Τον Μάρτιο πρόκειται να υποβληθεί στην Υπουργό Παιδείας και στην Διαρκή Επιτροπή Μορφωτικών Υποθέσεων της Βουλής αναλυτικός απολογισμός πεπραγμένων, όπως προβλέπει η κείμενη νομοθεσία, ο οποίος θα αναρτηθεί και στον ιστότοπο του οργανισμού.\r\n\r\nΑ. Διεκπεραίωση αιτήσεων\r\n\r\n    Χρόνοι αναμονής προελέγχου\r\n\r\nΌταν ανέλαβε η παρούσα διοίκηση, στις 13.02.2020, ο νεκρός χρόνος αναμονής όλων των αιτήσεων στην «ουρά προελέγχου» ήταν 180 ημέρες (έξι μήνες). Ήδη από τον Απρίλιο 2020 ο χρόνος αυτός είχε μειωθεί δραστικά στις περίπου 40 ημέρες. Στις 31.12.2021 ο χρόνος αναμονής προελέγχου ήταν 24 ημέρες, ενώ κατά τη σύνταξη του παρόντος δελτίου τύπου ήταν μόλις 15 ημέρες.\r\n\r\n    Χρόνοι διεκπεραίωσης των αιτήσεων\r\n\r\nΜε βάση τα τρέχοντα στοιχεία Ιανουαρίου 2022, οι προσδόκιμοι μέσοι χρόνοι διεκπεραίωσης των αιτήσεων (μετά τη λήψη Αριθμού Πρωτοκόλλου, δηλαδή, μετά τον προέλεγχο) είναι οι εξής:\r\n\r\n    52,8% των αιτήσεων 1-2 μήνες\r\n    10,6% των αιτήσεων 2-3 μήνες\r\n    20,6% των αιτήσεων 3-4 μήνες\r\n    2,0% των αιτήσεων 6-7 μήνες\r\n    6,8% των αιτήσεων 7-8 μήνες\r\n    7,2% των αιτήσεων 13-14 μήνες\r\n\r\nΔηλαδή, το 83,7% των αιτήσεων έχει προσδόκιμο μέσο χρόνο διεκπεραίωσης κάτω των 4 μηνών ή το 92,8% των αιτήσεων κάτω των 8 μηνών.\r\n\r\nΟι προσδόκιμοι αυτοί χρόνοι αντιστοιχούν σε συγκεκριμένους επιστημονικούς κλάδους. Οι διαφορές σχετίζονται με την άνιση κατανομή των δέκα Ειδικών Εισηγητών που υπηρετούν στον ΔΟΑΤΑΠ ανά επιστημονικό κλάδο. Η διοίκηση έχει εφαρμόσει το βέλτιστο σύστημα κατανομής αναθέσεων στους Ειδικούς Εισηγητές λαμβάνοντας υπ’ όψιν τους περιορισμούς της νομοθεσίας. Δεν μπορεί, π.χ., ένας Ειδικός Εισηγητής με ειδικότητα φιλολόγου να εξετάσει έναν τίτλο Βιολογίας, τόσο από νομική όσο και από ουσιαστική άποψη. Η ίση μεταχείριση των πολιτών με τίτλους του ιδίου κλάδου και η απόκρουση κάθε είδους εξωτερικής παρέμβασης από τρίτους για παραβίαση της σειράς προτεραιότητας αποτελούν απαράβατες αρχές της παρούσας διοίκησης.\r\n\r\n    Στατιστικά στοιχεία αναγνώρισης ακαδημαϊκών τίτλων\r\n\r\nΤο 2021 υποβλήθηκαν στον ΔΟΑΤΑΠ συνολικά 8.129 αιτήσεις αναγνώρισης τίτλων. Εκδόθηκαν 8.734 πράξεις, δηλαδή, αύξηση κατά 63,5% σε σχέση με τον ετήσιο μέσο όρο της δεκαετίας 2010-2019 (5.340 πράξεις) και κατά 23,6% σε σχέση με το 2020 (7.067 πράξεις).\r\n\r\nΌπως και το 2020, για δεύτερη συνεχόμενη χρονιά, το 2021, επιτεύχθηκε πλεόνασμα ολοκληρωμένων έναντι υποβληθεισών πράξεων (605 περισσότερες πράξεις), παρά τη μεγάλη αύξηση υποβληθεισών αιτήσεων κατά 18,4% σε σχέση με το 2020 (1.266 περισσότερες υποβληθείσες αιτήσεις το 2021). Από την ίδρυση του ΔΟΑΤΑΠ το 2005, μέχρι και το 2019 το ισοζύγιο έκλεινε πάντα με διεύρυνση του ελλείμματος των μη ολοκληρωμένων αιτήσεων.\r\n\r\nΒ. Βαθμολογική αντιστοιχία – γνησιότητα τίτλων\r\n\r\nΕκτός από τις 8.734 πράξεις αναγνώρισης τίτλου που εκδόθηκαν το 2021, στο ίδιο διάστημα εκδόθηκαν, ακόμη, περίπου 2.000 βεβαιώσεις βαθμολογικής αντιστοιχίας, κατόπιν αιτήματος των πολιτών και περίπου 9.000 βεβαιώσεις γνησιότητας τίτλων, κατόπιν αιτήματος φορέων, κυρίως του Δημοσίου και του ΑΣΕΠ.\r\n\r\nΓ. Ενημέρωση ενδιαφερομένων\r\n\r\nΣύμφωνα με τα καταγεγραμμένα στοιχεία του 2021, ο οργανισμός απαντά σε περίπου 2.500 ηλεκτρονικά μηνύματα και σε περίπου 4.500 τηλεφωνήματα πολιτών κάθε μήνα.\r\n\r\nΣτις 03.09.2021, παραδόθηκε στο κοινό ο νέος δικτυακός τόπος του ΔΟΑΤΑΠ, www.doatap.gr, τόσο σε έκδοση desktop, όσο και mobile. Χρησιμοποιήθηκαν οι πιο σύγχρονες τεχνολογίες ανοιχτής αρχιτεκτονικής και λογισμικού με στόχο να παραδοθεί μια δίγλωσση, υψηλής αισθητικής και λειτουργική ηλεκτρονική πύλη. Ήδη έχει συμβάλει καθοριστικά στην δραστική βελτίωση της ταχύτητας και της ποιότητας ενημέρωσης των πολιτών.\r\n\r\nΔ. Ψηφιακή διακυβέρνηση\r\n\r\n    Ψηφιοποίηση και διαλειτουργικότητα\r\n\r\nΕντός του 2021 έγινε η προκήρυξη, και ήδη βρίσκεται στην τελική φάση η ανακήρυξη αναδόχου, έργου ΕΣΠΑ με τίτλο: «Απλούστευση διαδικασιών/Ψηφιοποίηση φυσικού αρχείου ΔΟΑΤΑΠ/Ένταξη στη διαλειτουργικότητα» του Επιχειρησιακού Προγράμματος «Μεταρρύθμιση Δημόσιου Τομέα», προϋπολογισμού 800.000 ευρώ, που έχει ενταχθεί στο πρόγραμμα του Υπουργείου Παιδείας. Η έναρξη της υλοποίησης του έργου αναμένεται εντός του 2022.\r\n\r\nΤο έργο αφορά στην ψηφιοποίηση των περίπου 100.000 έγχαρτων φακέλων του ΔΟΑΤΑΠ και στην ανάπτυξη βάσης δεδομένων για την ένταξή τους, μαζί με τους περίπου 18.500 ηλεκτρονικούς φακέλους του eDoatap, σε εφαρμογές διαλειτουργικότητας του Υπουργείου Ψηφιακής Διακυβέρνησης, όπως: η ηλεκτρονική εφαρμογή eDiplomas για τον ψηφιακό έλεγχο γνησιότητας των τίτλων αναγνώρισης του Δ.Ο.Α.Τ.Α.Π., η ψηφιακή παροχή δεδομένων αναγνώρισης τίτλων στο ΑΣΕΠ, η ψηφιακή έκδοση γνήσιου αντίγραφου πράξεων αναγνώρισης κλπ.\r\n\r\nΕ. Τράπεζα Θεμάτων εξετάσεων Ιατρικής – Οδοντιατρικής\r\n\r\nΣτις 27.10.2021 δημοσιεύθηκε το ΦΕΚ με το οποίο ορίζονται επιτροπές Καθηγητών Ιατρικής/Οδοντιατρικής για την επεξεργασία, επικαιροποίηση και εμπλουτισμό της Τράπεζας Θεμάτων του Δ.Ο.Α.Τ.Α.Π. στις εξετάσεις Ιατρικής/Οδοντιατρικής σε σύνολο 15 μαθημάτων, οι οποίες οργανώνονται κατά νόμο από τον Δ.Ο.Α.Τ.Α.Π.. Οι επιτροπές άρχισαν τη λειτουργία τους από τον Νοέμβριο 2021. Η υπάρχουσα τράπεζα θεμάτων καταρτίστηκε πριν από 15 χρόνια. Θα αντικατασταθεί από ένα σώμα προβλημάτων στις βασικές, προκλινικές και κλινικές επιστήμες, ακολουθώντας τις εξελίξεις της επιστήμης και τη σύγχρονη διεθνή πρακτική. Το έργο αυτό αναμένεται να ολοκληρωθεί εντός του 2022.\r\n\r\nΣτ. Ανθρώπινο δυναμικό\r\n\r\nΤον Μάιο 2021 ολοκληρώθηκε η προκήρυξη του ΑΣΕΠ για την κάλυψη 10 κενών οργανικών θέσεων του ΔΟΑΤΑΠ. Η ανάρτηση των προσωρινών πινάκων των επιτυχόντων αναμένεται σύντομα.\r\n\r\nΤον Ιούλιο 2021 το Δ.Σ. του ΔΟΑΤΑΠ ενεργοποίησε για πρώτη φορά πρόβλεψη διάταξης νόμου, με την οποία δίνεται η δυνατότητα στον οργανισμό να απευθύνει πρόσκληση απόσπασης εκπαιδευτικών με προσόντα Ειδικού Εισηγητή, για τη στελέχωση κενών θέσεων Ειδικών Εισηγητών στους κλάδους που παρουσιάζουν τη μεγαλύτερη καθυστέρηση. Τον Δεκέμβριο 2021 υπογράφηκε η έγκριση της απόσπασης τριών εκπαιδευτικών και αναμένεται η τοποθέτησή τους στον ΔΟΑΤΑΠ.\r\n\r\nΖ. Η επόμενη μέρα\r\n\r\nΗ διοίκηση του Δ.Ο.Α.Τ.Α.Π. έχει πλήρη επίγνωση των χρόνιων, ενδογενών και εξωγενών, αδυναμιών του Οργανισμού, μεγάλο μέρος των οποίων πηγάζει από το αναχρονιστικό νομικό/θεσμικό πλαίσιο, το οποίο έχει ξεπεραστεί από τις διεθνείς και ευρωπαϊκές εξελίξεις εδώ και δεκαετίες.\r\n\r\nΤο Διοικητικό Συμβούλιο και όλο το προσωπικό του Οργανισμού εργάστηκαν σκληρά τη χρονιά που πέρασε για την υπέρβαση των ενδογενών αδυναμιών, με στόχο την εξυπηρέτηση των πολιτών και τη βελτίωση της εικόνας του ΔΟΑΤΑΠ στην ελληνική κοινωνία (rebranding). Προς την ίδια κατεύθυνση θα συνεχίσουν το έργο τους, με προσήλωση στις αρχές της νομιμότητας, της ισονομίας και της διαφάνειας, τηρώντας αυστηρά τη σειρά προτεραιότητας των ομοειδών αιτήσεων ανά κλάδο και με την προσδοκία του εκσυγχρονισμού του θεσμικού πλαισίου, ώστε να εξομαλυνθούν οι δυσχέρειες που προκαλούνται στις διαδικασίες και οφείλονται σε εξωγενή προβλήματα.\r\n\r\nΑθήνα, 17.01.2022\r\n', '2022-01-17 11:29:42'),
(3, '1', 'Σεμινάριο διάχυσης αποτελεσμάτων προγράμματος Erasmus+ «RefugeesandRecognition : Toolkit 3 (ARENA)»', '    	\r\n\r\nΣεμινάριο διάχυσης αποτελεσμάτων προγράμματος Erasmus+ «RefugeesandRecognition : Toolkit 3 (ARENA)»\r\n\r\nΣτο πλαίσιο του προγράμματος Erasmus+ «RefugeesandRecognition : Toolkit 3 (ARENA)» στο οποίο συμμετέχουν το Διεθνές Πανεπιστήμιο της Ελλάδος και ο Δ.Ο.Α.Τ.Α.Π., θα πραγματοποιηθεί εθνικό σεμινάριο διάχυσης αποτελεσμάτων από τη δοκιμή της εργαλειοθήκης για την αναγνώριση προσόντων των προσφύγων στο Διεθνές Πανεπιστήμιο της Ελλάδος ως συμπληρωματικής διαδικασίας στις υπάρχουσες για την αποδοχή και εισαγωγή προσφύγων με ελλιπή τεκμηρίωση των προσόντων τους στα μεταπτυχιακά του προγράμματα.\r\n\r\nΤο σεμινάριο θα διεξαχθεί στην αγγλική γλώσσα τη Δευτέρα 20 Δεκεμβρίου 2021 από τις 9:30-13:30 στο αμφιθέατρο «Γαλάτεια Σαράντη» στο Υπουργείο Παιδείας και Θρησκευμάτων με φυσική παρουσία, και διαδικτυακά μέσω σύνδεσης zoom.\r\n', '2021-12-18 11:32:19'),
(4, '1', 'Επίσκεψη στον ΔΟΑΤΑΠ', 'Ενημερώνουμε τους πολίτες που θα προσέρχονται στον ΔΟΑΤΑΠ από τη Δευτέρα 8/11/2021 ότι, για να εξυπηρετηθούν, θα πρέπει να επιδεικνύουν\r\n\r\nα) Πιστοποιητικό εμβολιασμού ή νόσησης ή αρνητικό rapid test ή αρνητικό μοριακό τέστ και\r\n\r\nβ) ταυτότητα ή διαβατήριο\r\n', '2021-11-07 11:32:58'),
(5, '2', 'Oι διπλωματικές εργασίες που κατατίθενται με τις αιτήσεις αναγνώρισης δεν επιστρέφονται.', 'Σύμφωνα με την απόφαση της 3ης/2-3-2018 συνεδρίασης της Ολομέλειας του Δ.Σ., οι διπλωματικές εργασίες που κατατίθενται με τις αιτήσεις αναγνώρισης δεν επιστρέφονται. Όσοι έχουν ήδη καταθέσει πρωτότυπη εργασία, θα μπορέσουν να την παραλάβουν κατά την παραλαβή της Πράξης Αναγνώρισης του τίτλου σπουδών τους εφόσον προσκομίσουν φωτοαντίγραφό της ή αντίγραφό της σε ψηφιακή μορφή.', '2018-04-20 11:33:51'),
(6, '2', 'Bachelor in Psychology του Ευρωπαϊκού Πολυτεχνικού Πανεπιστημίου, Πέρνικ, Βουλγαρία', 'Διευκρινίζεται ότι, μετά από σχετική πληροφόρηση που έλαβε ο Οργανισμός από το NACID της Βουλγαρίας, η ισοτιμία του προγράμματος σπουδών Bachelor in Psychology του Ευρωπαϊκού Πολυτεχνικού Πανεπιστημίου, Πέρνικ, Βουλγαρία προς τα προγράμματα των Ελληνικών Α.Ε..Ι. δεν θα αναγνωρίζεται για τους εισαχθέντες στο πρόγραμμα μετά την 7η Απριλίου 2016. Συγκεκριμένα, το εν λόγω Ίδρυμα δεν διαθέτει την απαραίτητη πιστοποίηση να προσφέρει προγράμματα Bachelor’s και Master’s στο τομέα της ψυχολογίας.', '2018-04-20 11:34:23'),
(7, '3', 'Πορεία Εκτέλεσης Προϋπολογισμού Νοεμβρίου 2021', '6Ε3Α46ΨΖ34-ΚΝΞ_ΔΗΜΟΣΙΕΥΣΗ-ΣΤΟΙΧΕΙΩΝ-ΕΚΤΕΛΕΣΗΣ-ΠΡΟΫΠΟΛΟΓΙΣΜΟΥ-ΝΟΕΜ-2021', '2021-12-15 11:35:15'),
(8, '4', 'AΠΟΤΕΛΕΣΜΑΤΑ ΕΞΕΤΑΣΕΩΝ ΟΔΟΝΤΙΑΤΡΙΚΗΣ — ΙΑΝΟΥΑΡΙΟΣ 2022-ΕΚΤΑΚΤΗ ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ', 'ΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗΣ IANOYAΡΙΟΣ 2022 (EKTAKTH ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ)	\r\nΜΑΘΗΜΑ: ΟΔΟΝΤΙΚΗ ΧΕΙΡΟΥΡΓΙΚΗ (10.01.2022)	\r\nAΠΟΤΕΛΕΣΜΑΤΑ	\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ\r\n1	11556/2018	ΟΔΟΝΤΙΚΗ ΧΕΙΡΟΥΡΓΙΚΗ	84,00\r\n2	Α/2367-2021(2021-04-21)	ΟΔΟΝΤΙΚΗ ΧΕΙΡΟΥΡΓΙΚΗ	19,00\r\n3	Α/2366-2021(2021-04-21)	ΟΔΟΝΤΙΚΗ ΧΕΙΡΟΥΡΓΙΚΗ	27,5\r\n4	Α/4137-2021(2021-07-09)	ΟΔΟΝΤΙΚΗ ΧΕΙΡΟΥΡΓΙΚΗ	47,75\r\n5	 Α/1488-2020(2020-03-26)	ΟΔΟΝΤΙΚΗ ΧΕΙΡΟΥΡΓΙΚΗ	68,5\r\n6	Α/3971-2021(202107-01)	ΟΔΟΝΤΙΚΗ ΧΕΙΡΟΥΡΓΙΚΗ	74,75\r\nΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗΣ IANOYAΡΙΟΣ 2022-EKTAKTH ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ	\r\nΜΑΘΗΜΑ: ΕΞΑΚΤΙΚΗ (10.01.2022)\r\nΑΠΟΤΕΛΕΣΜΑΤΑ\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ\r\n1	11556/2018	ΕΞΑΚΤΙΚΗ	70,00\r\n2	18452/2018	ΕΞΑΚΤΙΚΗ	68,25\r\n3	Α/7428-2021(2021-11-15)	ΕΞΑΚΤΙΚΗ	77,75\r\n4	Α/2367-2021(2021-04-21)	ΕΞΑΚΤΙΚΗ	35,25\r\n5	Α/2366-2021(2021-04-21)	ΕΞΑΚΤΙΚΗ	40,00\r\n6	Α/7889-2021(2021-12-06)	ΕΞΑΚΤΙΚΗ	85,25\r\nΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗ IANOYAΡΙΟΣ 2022-ΕΚΤΑΚΤΗ ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ	\r\n\r\nΜΑΘΗΜΑ: ΑΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ (11.01.2022)	\r\nAΠΟΤΕΛΕΣΜΑΤΑ	\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ\r\n1	36817/2007	ΑΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	54,00\r\n2	Α/4137-2021(2021-07-09)	ΑΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	44,50\r\n3	Α/3971-2021(202107-01)	ΑΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	65,00\r\nΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗΣ IANOYAΡΙΟΣ 2022-EKTAKTH ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ	\r\nΜΑΘΗΜΑ: ΣΤΟΜΑΤΟΛΟΓΙΑ (11.01.2022)	\r\nAΠΟΤΕΛΕΣΜΑΤΑ	\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ\r\n1	5638/2013	ΣΤΟΜΑΤΟΛΟΓΙΑ	65,75\r\n2	18452/2018	ΣΤΟΜΑΤΟΛΟΓΙΑ	85,75\r\n3	Α/7428-2021(2021-11-15)	ΣΤΟΜΑΤΟΛΟΓΙΑ	87,50\r\n4	Α/4461-2020(2020-07-23)	ΣΤΟΜΑΤΟΛΟΓΙΑ	77,75\r\n5	Α/7889-2021(2021-12-06)	ΣΤΟΜΑΤΟΛΟΓΙΑ	89,25\r\nΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗΣ ΙΑΝΟΥΑΡΙΟΣ 2022-ΕΚΤΑΚΤΗ ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ	\r\nΜΑΘΗΜΑ: ΠΕΡΙΟΔΟΝΤΟΛΟΓΙΑ (12.01.2022)	\r\nAΠΟΤΕΛΕΣΜΑΤΑ	\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ\r\n1	36817/2007	ΠΕΡΙΟΔΟΝΤΟΛΟΓΙΑ	47,00\r\nΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗΣ ΙΑΝΟΥΑΡΙΟΣ 2022-ΕΚΤΑΚΤΗ ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ	\r\nΜΑΘΗΜΑ: ΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ (12.01.2022)	\r\nAΠΟΤΕΛΕΣΜΑΤΑ	\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ\r\n1	12307/2011	ΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	57,50\r\n2	18452/2018	ΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	86,75\r\n3	36817/2007	ΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	52,50\r\n4	Α/4137-2021(2021-07-09)	ΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	44,50\r\n5	 Α/1488-2020(2020-03-26)	ΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	70,25\r\n6	Α/4461-2020(2020-07-23)	ΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	89,5\r\n7	Α/3971-2021(202107-01)	ΚΙΝΗΤΗ ΠΡΟΣΘΕΤΙΚΗ	65,25\r\nΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗΣ ΙΑΝΟΥΑΡΙΟΣ 2022-ΕΚΤΑΚΤΗ ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ	\r\nΜΑΘΗΜΑ: ΕΝΔΟΔΟΝΤΙΑ (13.01.2022)	\r\nAΠΟΤΕΛΕΣΜΑΤΑ	\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ\r\n1	18452/2018	ΕΝΔΟΔΟΝΤΙΑ	71,50\r\n2	36817/2007	ΕΝΔΟΔΟΝΤΙΑ	41,75\r\n3	Α/5194-2020(2020-09-22)	ΕΝΔΟΔΟΝΤΙΑ	55,25\r\n4	 Α/1488-2020(2020-03-26)	ΕΝΔΟΔΟΝΤΙΑ	57,50\r\n5	Α/4461-2020(2020-07-23)	ΕΝΔΟΔΟΝΤΙΑ	56,50\r\nΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗΣ ΙΑΝΟΥΑΡΙΟΣ 2022-ΕΚΤΑΚΤΗ ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ	\r\nΜΑΘΗΜΑ: ΑΚΤΙΝΟΔΙΑΓΝΩΣΤΙΚΗ (13.01.2022)	\r\nAΠΟΤΕΛΕΣΜΑΤΑ	\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ\r\n1	10528/2002	ΑΚΤΙΝΟΔΙΑΓΝΩΣΤΙΚΗ	53,25\r\n2	18452/2018	ΑΚΤΙΝΟΔΙΑΓΝΩΣΤΙΚΗ	83,75\r\n3	36817/2007	ΑΚΤΙΝΟΔΙΑΓΝΩΣΤΙΚΗ	45,75\r\n4	Α/5194-2020(2020-09-22)	ΑΚΤΙΝΟΔΙΑΓΝΩΣΤΙΚΗ	45,25\r\n5	Α/3587-2021(2021-06-11)	ΑΚΤΙΝΟΔΙΑΓΝΩΣΤΙΚΗ	67,25\r\n6	 Α/1488-2020(2020-03-26)	ΑΚΤΙΝΟΔΙΑΓΝΩΣΤΙΚΗ	51,25\r\n7	Α/3971-2021(202107-01)	ΑΚΤΙΝΟΔΙΑΓΝΩΣΤΙΚΗ	53,00', '2022-01-14 11:36:05'),
(9, '4', 'ΛΙΣΤΑ ΣΥΜΜΕΤΕΧΟΝΤΩΝ ΣΤΙΣ ΕΞΕΤΑΣΕΙΣ ΟΔΟΝΤΙΑΤΡΙΚΗΣ ΠΕΡΙΟΔΟΥ ΙΑΝΟΥΑΡΙΟΥ 2022', 'Προς αναπλήρωση της μη διεξαχθείσας, λόγω περιοριστικών μέτρων κατά της πανδημίας, 2ης εξ. περιόδου 2020\r\nΑ/Α	ΑΡΙΘΜ. ΠΡΩΤ.\r\n1	10528/2002\r\n2	5638/2013\r\n3	11556/2018\r\n4	12307/2011\r\n5	18452/2018\r\n6	36817/2007\r\n7	Α/7428-2021(2021-11-15)\r\n8	Α/2367-2021(2021-04-21)\r\n9	Α/2366-2021(2021-04-21)\r\n10	Α/4137-2021(2021-07-09)\r\n11	Α/5194-2020(2020-09-22)\r\n12	Α/3587-2021(2021-06-11)\r\n13	 Α/1488-2020(2020-03-26)\r\n14	Α/4461-2020(2020-07-23)\r\n15	Α/7889-2021(2021-12-06)\r\n16	Α/3971-2021(202107-01)', '2022-01-05 11:37:05'),
(10, '5', 'AΠΟΤΕΛΕΣΜΑΤΑ ΕΞΕΤΑΣΕΩΝ ΙΑΤΡΙΚΗΣ — ΔΕΚΕΜΒΡΙΟΣ 2021-ΕΚΤΑΚΤΗ ΕΞΕΤΑΣΤΙΚΗ ΠΕΡΙΟΔΟΣ ΦΑΡΜΑΚΟΛΟΓΙΑ', 'ΜΑΘΗΜΑ: ΦΑΡΜΑΚΟΛΟΓΙΑ (16.12.2021)\r\nΕΠΙΤΥΧΟΝΤΕΣ\r\nΑ/Α	ΠΡΩΤΟΚΟΛΛΟ	ΜΑΘΗΜΑ	ΒΑΘΜΟΣ		\r\n1	Α/6045-2021(2021-10-01)	ΦΑΡΜΑΚΟΛΟΓΙΑ	51,00		\r\n2	Α/7427-2021(2021-11-15)	ΦΑΡΜΑΚΟΛΟΓΙΑ	55,00		\r\n3	Α/3073-2021(2021-05-27)	ΦΑΡΜΑΚΟΛΟΓΙΑ	67,25		\r\n4	Α/7132-2021(2021-11-04)	ΦΑΡΜΑΚΟΛΟΓΙΑ	70,25		\r\n5	Α/5126-2021(2021-09-01)	ΦΑΡΜΑΚΟΛΟΓΙΑ	70,25		\r\n6	Α/5725-2021(2021-09-21)	ΦΑΡΜΑΚΟΛΟΓΙΑ	70,50		\r\n7	Α/2557-2020(2020-05-11)	ΦΑΡΜΑΚΟΛΟΓΙΑ	70,50		\r\n8	Α/6839-2021(2021-10-25)	ΦΑΡΜΑΚΟΛΟΓΙΑ	74,50		\r\n9	Α/5125-2021(2021-09-01)	ΦΑΡΜΑΚΟΛΟΓΙΑ	77,50		\r\n10	Α/6943-2021(2021-10-27)	ΦΑΡΜΑΚΟΛΟΓΙΑ	77,75		\r\n11	Α/6749-2021(2021-10-20)	ΦΑΡΜΑΚΟΛΟΓΙΑ	82,50		\r\n12	Α/7402-2021(2021-11-12)	ΦΑΡΜΑΚΟΛΟΓΙΑ	87,25		\r\n13	Α/6562-2021(2021-10-15)	ΦΑΡΜΑΚΟΛΟΓΙΑ	88,25		\r\n14	29484/2018	ΦΑΡΜΑΚΟΛΟΓΙΑ	90,5		\r\n15	Α/6539-2021(2021-10-14)	ΦΑΡΜΑΚΟΛΟΓΙΑ	91', '2022-12-16 11:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `app_id` int NOT NULL,
  `state` enum('approved','pending','submitted','declined','stored') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'submitted',
  `user_id` int NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attendance` tinyint(1) NOT NULL,
  `studiesType` tinyint(1) NOT NULL,
  `country` int NOT NULL,
  `ECTS` int NOT NULL,
  `dateIntro` date DEFAULT NULL,
  `dateGrad` date DEFAULT NULL,
  `yearsOfStudy` tinyint NOT NULL,
  `department` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `university` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `basicInfoApproved` tinyint(1) NOT NULL DEFAULT '1',
  `studiesInfoApproved` tinyint(1) NOT NULL DEFAULT '1',
  `degree_type` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `coun_id` int NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`coun_id`, `name`) VALUES
(1, 'Ελλάδα'),
(2, 'Ισπανία'),
(3, 'Ιταλία'),
(4, 'Γαλλία'),
(5, 'Γερμανία'),
(6, 'Ηνωμένο Βασίλειο'),
(7, 'Ελβετία'),
(8, 'Ιρλανδία'),
(9, 'Πολωνία'),
(10, 'Πορτογαλία');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `app_id` int NOT NULL,
  `title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int NOT NULL,
  `name` varchar(40) NOT NULL,
  `university` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `name`, `university`) VALUES
(1, 'Infomatics and Telecommunications', 1),
(2, 'Ιστορίας & Αρχαιολογίας', 3);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int NOT NULL,
  `app_id` int NOT NULL,
  `filename` varchar(40) NOT NULL,
  `file_location` varchar(60) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `type` enum('id','app','par') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `uni_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `country` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`uni_id`, `name`, `country`) VALUES
(1, 'University of Athens (UOA)', 1),
(2, 'University of West Attica  (UNIWA)', 1),
(3, 'Aristotle University of Thessaloniki (AUTH)', 1),
(4, 'University of Patras (UOP)', 1),
(5, 'University of Thessaly (UOT)', 1),
(6, 'Universitat de Barcelona', 2),
(7, 'Universidad de Granada', 2),
(8, 'Universitat Politecnica de Valencia', 2),
(9, 'Universidad Europea', 2),
(10, 'Universidad Zaragoza', 2),
(11, 'University of Trento', 3),
(12, 'Università di Siena - Palazzo del Rettorato', 3),
(13, 'University of Rome \"Tor Vergata\"', 3),
(14, 'Università Ca\' Foscari Venezia', 3),
(15, 'University of Parma', 3),
(16, 'University of Paris-Saclay', 4),
(17, 'Sorbonne Université', 4),
(18, 'Université de Paris', 4),
(19, 'Grenoble Alpleri Üniversitesi', 4),
(20, 'Université Jean Moulin Lyon ', 4),
(21, 'Technical University of Braunschweig', 5),
(22, 'University of Potsdam', 5),
(23, 'Duisburg-Essen Üniversitesi', 5),
(24, 'Berlin School of Economics and Law ', 5),
(25, 'University of Lisbon', 10),
(26, 'University of Porto', 10),
(27, 'University of Coimbra', 10),
(28, 'University of Nova de Lisboa', 10),
(29, 'University of Minho', 10),
(30, 'Ostbayerische Technische Hochschule (OTH)', 5),
(31, 'Jagiellonian University', 9),
(32, 'University of Warsaw', 9),
(33, 'Warsaw University of Technology', 9),
(34, 'AGH University of Science and Technology', 9),
(35, 'University of Zielona Gora', 9),
(36, 'Cambridge University ', 6),
(37, 'Technological University of Dublin', 8),
(38, 'Maynooth University', 8),
(39, 'University of Limerick (UL)', 8),
(40, 'Dublin City University (DCU)', 8),
(41, 'University College Cork (UCC)', 8),
(42, 'University of Oxford', 6),
(43, 'Swiss Federal Institute of Technology Zurich', 7),
(44, 'University of Zurich', 7),
(45, 'École Polytechnique Federale of Lausanne', 7),
(46, 'University of Geneva', 7),
(47, 'University of Bern', 7),
(48, 'University of Edinburgh', 6),
(49, 'University of London', 6),
(50, 'University of Exeter', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` char(64) NOT NULL,
  `email` varchar(40) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mothers_name` varchar(20) NOT NULL,
  `fathers_name` varchar(20) NOT NULL,
  `country` int NOT NULL,
  `city` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `docType` enum('ID','Passport') NOT NULL,
  `docNumber` varchar(15) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `birthday` date NOT NULL DEFAULT '1900-01-01',
  `mobile` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `isAdmin`, `first_name`, `last_name`, `mothers_name`, `fathers_name`, `country`, `city`, `address`, `docType`, `docNumber`, `gender`, `birthday`, `mobile`, `phone`) VALUES
(1, 'ADMIN', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'admin@doatap.gr', 1, 'ΜΑΡΙΑ', 'ΛΑΙΟΥ', 'ΕΛΕΝΗ', 'ΑΡΗΣ', 1, 'ΑΘΗΝΑ', 'ΑΘΗΝΑΣ 2', 'ID', 'AM123456', 'Female', '1990-05-23', '6924681357', '2101234567'),
(2, 'USER1', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'user1@mail.com', 0, 'Λάκης', 'Λαλάκης', 'Κατερίνα', 'Ερμής', 1, 'ΘΕΣΣΑΛΟΝΙΚΗ', 'ΤΣΙΜΙΣΚΗ 12, ΘΕΣΣΑΛΟΝΙΚΗ', 'ID', 'ΚΜ96423', 'Male', '1998-09-05', '6912345678', '2101357924'),
(3, 'USER2', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 'user2@mail.com', 0, 'Sofia', 'Hernandez', 'Valentina', 'Juan', 2, 'Barcelona', 'Carrer de Manso, 13,Barcelona', 'Passport', 'ΑΑ8990076', 'Female', '2000-02-14', '6913579246', '2102467942');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`coun_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`app_id`,`title`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `university` (`university`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`uni_id`),
  ADD KEY `country` (`country`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ann_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `app_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `coun_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `uni_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`university`) REFERENCES `universities` (`uni_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`country`) REFERENCES `countries` (`coun_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
