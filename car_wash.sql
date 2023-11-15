-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `car_wash`;
CREATE DATABASE `car_wash` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `car_wash`;

CREATE TABLE `estacion` (
  `idestacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idestacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `estacion` (`idestacion`, `nombre`) VALUES
(1,	'A'),
(2,	'B'),
(3,	'C'),
(4,	'D');

CREATE TABLE `horario` (
  `idhorario` int(11) NOT NULL AUTO_INCREMENT,
  `hora_inicial` time NOT NULL,
  `hora_final` time NOT NULL,
  PRIMARY KEY (`idhorario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `horario` (`idhorario`, `hora_inicial`, `hora_final`) VALUES
(1,	'10:00:00',	'11:00:00'),
(2,	'11:00:00',	'12:00:00'),
(3,	'12:00:00',	'13:00:00'),
(4,	'13:00:00',	'14:00:00'),
(5,	'14:00:00',	'15:00:00'),
(6,	'15:00:00',	'16:00:00'),
(7,	'17:00:00',	'18:00:00');

CREATE TABLE `log_checkout` (
  `idservicio` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `pasarela` varchar(100) NOT NULL,
  `json` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `log_checkout` (`idservicio`, `fecha`, `pasarela`, `json`) VALUES
(132,	'2022-03-28 01:31:54',	'Stripe',	'{\"id\":\"ch_3Ki7QzCls0jBo5C11fE8HG9I\",\"object\":\"charge\",\"amount\":20000,\"amount_captured\":20000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Ki7QzCls0jBo5C11p3wn3Ri\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648431113,\"currency\":\"mxn\",\"customer\":\"cus_LOvHjmuUYmeGoL\",\"description\":\"Medio\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"132\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":25,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Ki7QxCls0jBo5C1K3YnWCg6\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":5,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3Ki7QzCls0jBo5C11fE8HG9I\\/rcpt_LOvHtQetcKlW9iGOYw8PZknSgHCipfC\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Ki7QzCls0jBo5C11fE8HG9I\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Ki7QxCls0jBo5C1K3YnWCg6\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOvHjmuUYmeGoL\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":5,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(132,	'2022-03-28 01:35:25',	'Stripe',	'{\"id\":\"ch_3Ki7UOCls0jBo5C115y0ZGuo\",\"object\":\"charge\",\"amount\":20000,\"amount_captured\":20000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Ki7UOCls0jBo5C112qqWIvR\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648431324,\"currency\":\"mxn\",\"customer\":\"cus_LOvLp3u5fbE3wX\",\"description\":\"Medio\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"132\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":18,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Ki7ULCls0jBo5C1HyOLrblr\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":5,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3Ki7UOCls0jBo5C115y0ZGuo\\/rcpt_LOvLevd7KEg7lKldW7Xg5hI3gjtak8a\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Ki7UOCls0jBo5C115y0ZGuo\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Ki7ULCls0jBo5C1HyOLrblr\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOvLp3u5fbE3wX\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":5,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(132,	'2022-03-28 02:02:34',	'Stripe',	'{\"id\":\"ch_3Ki7ufCls0jBo5C10dMOjqPP\",\"object\":\"charge\",\"amount\":20000,\"amount_captured\":20000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Ki7ufCls0jBo5C10lye1EAh\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648432953,\"currency\":\"mxn\",\"customer\":\"cus_LOvmZEiAjlta9a\",\"description\":\"Medio\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"132\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":25,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Ki7udCls0jBo5C1LG2lY8d7\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":8,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3Ki7ufCls0jBo5C10dMOjqPP\\/rcpt_LOvmCC3KQmVFKlGU4KF0LrlecD1Zyr3\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Ki7ufCls0jBo5C10dMOjqPP\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Ki7udCls0jBo5C1LG2lY8d7\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOvmZEiAjlta9a\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":8,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(385,	'2022-03-28 04:06:11',	'Stripe',	'{\"id\":\"ch_3Ki9qICls0jBo5C10zC5H2I2\",\"object\":\"charge\",\"amount\":30000,\"amount_captured\":30000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Ki9qICls0jBo5C10eBGqwqo\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648440370,\"currency\":\"mxn\",\"customer\":\"cus_LOxl36Qjp6rjtw\",\"description\":\"Premium\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"385\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":20,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Ki9qGCls0jBo5C1zGFyyOVl\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":9,\"exp_year\":2026,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3Ki9qICls0jBo5C10zC5H2I2\\/rcpt_LOxlqGxoJoHlzzsbp569KFPEs3ssNkZ\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Ki9qICls0jBo5C10zC5H2I2\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Ki9qGCls0jBo5C1zGFyyOVl\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOxl36Qjp6rjtw\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":9,\"exp_year\":2026,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(136,	'2022-03-28 04:07:54',	'Stripe',	'{\"id\":\"ch_3Ki9rxCls0jBo5C10NKN91f9\",\"object\":\"charge\",\"amount\":17000,\"amount_captured\":17000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Ki9rxCls0jBo5C10Cg9ml1L\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648440473,\"currency\":\"mxn\",\"customer\":\"cus_LOxnXpRyQM5Kyz\",\"description\":\"VIP\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"136\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":12,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Ki9ruCls0jBo5C1ISDDpQcW\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":5,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3Ki9rxCls0jBo5C10NKN91f9\\/rcpt_LOxnEvzdKhRhRtLv0AcG2hlqi0kNH7b\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Ki9rxCls0jBo5C10NKN91f9\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Ki9ruCls0jBo5C1ISDDpQcW\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOxnXpRyQM5Kyz\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":5,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(332,	'2022-03-28 04:35:08',	'Stripe',	'{\"id\":\"ch_3KiAIKCls0jBo5C10yrwq2kr\",\"object\":\"charge\",\"amount\":20000,\"amount_captured\":20000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3KiAIKCls0jBo5C10zhc6Kj1\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648442108,\"currency\":\"mxn\",\"customer\":\"cus_LOyEXPnRtvJ5cX\",\"description\":\"Medio\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"332\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":48,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1KiAIGCls0jBo5C1pUv0ub7U\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":7,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3KiAIKCls0jBo5C10yrwq2kr\\/rcpt_LOyEp7XFl2HSaJCgnGJal8YiK8mdCUR\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3KiAIKCls0jBo5C10yrwq2kr\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1KiAIGCls0jBo5C1pUv0ub7U\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOyEXPnRtvJ5cX\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":7,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(342,	'2022-03-28 04:44:30',	'Stripe',	'{\"id\":\"ch_3KiARNCls0jBo5C11bGiR3uI\",\"object\":\"charge\",\"amount\":50000,\"amount_captured\":50000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3KiARNCls0jBo5C11WTCAei3\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648442669,\"currency\":\"mxn\",\"customer\":\"cus_LOyOZuLzgTj3yS\",\"description\":\"Medio\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"342\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":16,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1KiARKCls0jBo5C1cVOaW2uq\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":7,\"exp_year\":2024,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3KiARNCls0jBo5C11bGiR3uI\\/rcpt_LOyO7MjnxA8Nh7yLkEBbPDVbaZrnyw1\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3KiARNCls0jBo5C11bGiR3uI\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1KiARKCls0jBo5C1cVOaW2uq\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOyOZuLzgTj3yS\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":7,\"exp_year\":2024,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(345,	'2022-03-28 04:51:34',	'Stripe',	'{\"id\":\"ch_3KiAYECls0jBo5C10p3BowQt\",\"object\":\"charge\",\"amount\":30000,\"amount_captured\":30000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3KiAYECls0jBo5C108vWtNmt\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648443094,\"currency\":\"mxn\",\"customer\":\"cus_LOyVGlmi2axEAB\",\"description\":\"Premium\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"345\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":47,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1KiAYBCls0jBo5C1gwGNjVXf\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":9,\"exp_year\":2023,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3KiAYECls0jBo5C10p3BowQt\\/rcpt_LOyVwj69oGY8n6JqOeDdIwd0fdaWj0K\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3KiAYECls0jBo5C10p3BowQt\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1KiAYBCls0jBo5C1gwGNjVXf\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOyVGlmi2axEAB\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":9,\"exp_year\":2023,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(349,	'2022-03-28 05:06:24',	'Stripe',	'{\"id\":\"ch_3KiAmaCls0jBo5C11Om9g1qC\",\"object\":\"charge\",\"amount\":17000,\"amount_captured\":17000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3KiAmaCls0jBo5C11fKsz8DR\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648443984,\"currency\":\"mxn\",\"customer\":\"cus_LOykWmJtKEd2uT\",\"description\":\"VIP\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"349\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":10,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1KiAmXCls0jBo5C1tXktqyPP\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":7,\"exp_year\":2024,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3KiAmaCls0jBo5C11Om9g1qC\\/rcpt_LOykRv7ZB3szBxKu7t9gxiZES2cXAFG\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3KiAmaCls0jBo5C11Om9g1qC\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1KiAmXCls0jBo5C1tXktqyPP\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LOykWmJtKEd2uT\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":7,\"exp_year\":2024,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(335,	'2022-03-30 04:03:19',	'Stripe',	'{\"id\":\"ch_3KiskcCls0jBo5C10PVVgCE6\",\"object\":\"charge\",\"amount\":160000,\"amount_captured\":160000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3KiskcCls0jBo5C10clNgfcI\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648612998,\"currency\":\"mxn\",\"customer\":\"cus_LPiAsfWOtiFhYD\",\"description\":\"VIP\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"335\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":37,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1KiskWCls0jBo5C1Qw2IVLkA\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":7,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3KiskcCls0jBo5C10PVVgCE6\\/rcpt_LPiAcMh6HqUTEuHEsk5MhZLkKruYDGA\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3KiskcCls0jBo5C10PVVgCE6\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1KiskWCls0jBo5C1Qw2IVLkA\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LPiAsfWOtiFhYD\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":7,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(351,	'2022-03-30 13:22:06',	'Stripe',	'{\"id\":\"ch_3Kj1TOCls0jBo5C10hDqV7hJ\",\"object\":\"charge\",\"amount\":17000,\"amount_captured\":17000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Kj1TOCls0jBo5C10Q9QprgG\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648646526,\"currency\":\"mxn\",\"customer\":\"cus_LPrBewtm6kxBmy\",\"description\":\"VIP\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"351\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":57,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Kj1TMCls0jBo5C1FofR69s0\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":7,\"exp_year\":2024,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3Kj1TOCls0jBo5C10hDqV7hJ\\/rcpt_LPrBR9a7PIk2DPDg6PiBJRQfbxR6QdB\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Kj1TOCls0jBo5C10hDqV7hJ\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Kj1TMCls0jBo5C1FofR69s0\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LPrBewtm6kxBmy\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":7,\"exp_year\":2024,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}'),
(393,	'2022-03-30 17:59:01',	'Stripe',	'{\"id\":\"ch_3Kj5nNCls0jBo5C10utMRxhO\",\"object\":\"charge\",\"amount\":30000,\"amount_captured\":30000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"application_fee_amount\":null,\"balance_transaction\":\"txn_3Kj5nNCls0jBo5C108z9abTz\",\"billing_details\":{\"address\":{\"city\":null,\"country\":null,\"line1\":null,\"line2\":null,\"postal_code\":null,\"state\":null},\"email\":null,\"name\":null,\"phone\":null},\"calculated_statement_descriptor\":\"Stripe\",\"captured\":true,\"created\":1648663141,\"currency\":\"mxn\",\"customer\":\"cus_LPveyEqaHLpmaz\",\"description\":\"Premium\",\"destination\":null,\"dispute\":null,\"disputed\":false,\"failure_balance_transaction\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":{\"order_id\":\"393\"},\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"risk_score\":56,\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"payment_intent\":null,\"payment_method\":\"card_1Kj5nLCls0jBo5C14NtLhF1P\",\"payment_method_details\":{\"card\":{\"brand\":\"visa\",\"checks\":{\"address_line1_check\":null,\"address_postal_code_check\":null,\"cvc_check\":\"pass\"},\"country\":\"US\",\"exp_month\":5,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"installments\":null,\"last4\":\"4242\",\"mandate\":null,\"network\":\"visa\",\"three_d_secure\":null,\"wallet\":null},\"type\":\"card\"},\"receipt_email\":null,\"receipt_number\":null,\"receipt_url\":\"https:\\/\\/pay.stripe.com\\/receipts\\/acct_1KhOMdCls0jBo5C1\\/ch_3Kj5nNCls0jBo5C10utMRxhO\\/rcpt_LPveli9SYzA2vcz6Xgntt5WYmT0Bnxj\",\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_3Kj5nNCls0jBo5C10utMRxhO\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Kj5nLCls0jBo5C14NtLhF1P\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_LPveyEqaHLpmaz\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":5,\"exp_year\":2025,\"fingerprint\":\"Vx3ZQdK4oPfzL6Aq\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":null,\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"statement_descriptor_suffix\":null,\"status\":\"succeeded\",\"transfer_data\":null,\"transfer_group\":null}');

CREATE TABLE `materiaprimaxtiposervicio` (
  `idmateria_prima` int(11) NOT NULL,
  `idtiposervicio` int(11) NOT NULL,
  KEY `idtiposervicio` (`idtiposervicio`),
  KEY `idmateria_prima` (`idmateria_prima`),
  CONSTRAINT `materiaprimaxtiposervicio_ibfk_1` FOREIGN KEY (`idtiposervicio`) REFERENCES `tipo_servicio` (`idtiposervicio`),
  CONSTRAINT `materiaprimaxtiposervicio_ibfk_2` FOREIGN KEY (`idmateria_prima`) REFERENCES `materia_prima` (`idmateria_prima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `materiaprimaxtiposervicio` (`idmateria_prima`, `idtiposervicio`) VALUES
(1,	1),
(3,	1),
(1,	3),
(2,	3),
(3,	3),
(1,	4),
(2,	4),
(3,	4),
(4,	4);

CREATE TABLE `materia_prima` (
  `idmateria_prima` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idmateria_prima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `materia_prima` (`idmateria_prima`, `nombre`, `precio`) VALUES
(1,	'Shampoo',	150.00),
(2,	'Cera',	100.00),
(3,	'Aromatizante',	200.00),
(4,	'Perfume',	80.00);

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `permiso` (`idpermiso`, `nombre`, `clave`) VALUES
(1,	'Modulo de servicios',	'SERVICIO'),
(2,	'Modulo de personal',	'PERSONAL'),
(3,	'Modulo de tipos de socio',	'TIPOSOCIO'),
(4,	'Modulo de sucursales',	'SUCURSAL'),
(5,	'Modulo de socio',	'SOCIO'),
(6,	'Modulo de rentas',	'RENTAS'),
(7,	'Modulo de tiposervicio',	'TIPOSERVICIO'),
(8,	'Modulo de materias',	'MATERIAS'),
(9,	'Modulo de roles',	'ROLES'),
(10,	'Modulo de Permisos',	'PERMISOS'),
(11,	'Modulo Buscador',	'BUSCADOR'),
(12,	'Modulo Reservar Servicio',	'RESERVARSERVICIO'),
(13,	'Modulo de Estaciones',	'ESTACIONES'),
(14,	'Modulo de horarios',	'HORARIOS'),
(15,	'Modulo de Usuarios',	'USUARIOS');

CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `curp` varchar(12) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 NOT NULL,
  `idsucursal` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idpersonal`),
  KEY `idsucursal` (`idsucursal`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`idsucursal`) REFERENCES `sucursal` (`idsucursal`),
  CONSTRAINT `personal_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

INSERT INTO `personal` (`idpersonal`, `nombre`, `curp`, `foto`, `idsucursal`, `idusuario`) VALUES
(1,	'Kelly Ayuso',	'KAYIFGBRQEGF',	'fotos/foto-1631934680.jpg',	4,	2),
(2,	'Nino Nakano',	'NkanoNino123',	'fotos/foto-1631920207.png',	4,	2),
(3,	'Rias',	'Rias es mi p',	'fotos/foto-1631919899.jpg',	2,	2),
(4,	'Nakano miku',	'MESC040618H2',	'fotos/foto-1631935041.jpg',	1,	2),
(5,	'Kelly Nazaret',	'MESC040618HY',	'fotos/foto-1631935102.png',	3,	2),
(6,	'Jack Bezarius',	'afgt210604HY',	'',	3,	9),
(30,	'Lisa Brekke IV Kunde',	'{A-Z0-9}}}}}',	'',	2,	2),
(31,	'Brad Conn Stehr',	'{A-Z0-9}}}}}',	'',	2,	2),
(32,	'Miss Alexandrea Hilll II O\'Connell',	'{A-Z0-9}}}}}',	'',	1,	2),
(33,	'Abigail Carroll Padberg',	'{A-Z0-9}}}}}',	'',	2,	2),
(34,	'Verdie Gaylord Kihn',	'{A-Z0-9}}}}}',	'',	4,	2),
(35,	'Queen McLaughlin Wisozk',	'{A-Z0-9}}}}}',	'',	4,	2),
(36,	'Trinity Schulist MD Adams',	'{A-Z0-9}}}}}',	'',	4,	2),
(37,	'Prof. Conner Becker PhD Klein',	'{A-Z0-9}}}}}',	'',	2,	2),
(38,	'Prof. Ari Borer II Wolf',	'{A-Z0-9}}}}}',	'',	1,	2),
(39,	'Santiago Bayer Bins',	'{A-Z0-9}}}}}',	'',	3,	2),
(40,	'Alberta Bahringer Eichmann',	'{A-Z0-9}}}}}',	'',	3,	2),
(41,	'Lizzie Romaguera Abshire',	'{A-Z0-9}}}}}',	'',	3,	2),
(42,	'Freeda Aufderhar Fritsch',	'{A-Z0-9}}}}}',	'',	2,	2),
(43,	'Mrs. Constance Hackett Lindgren',	'{A-Z0-9}}}}}',	'',	3,	2),
(44,	'Prof. Abel Heathcote Abshire',	'{A-Z0-9}}}}}',	'',	3,	2),
(45,	'Daphne Kozey Kulas',	'{A-Z0-9}}}}}',	'',	4,	2),
(46,	'Junior Hettinger Goodwin',	'{A-Z0-9}}}}}',	'',	3,	2),
(47,	'Dr. Giovanni Ritchie Jr. Conn',	'{A-Z0-9}}}}}',	'',	3,	2),
(48,	'Alexandre Herzog Nitzsche',	'{A-Z0-9}}}}}',	'',	4,	2),
(49,	'Dr. Camryn Bayer Hackett',	'{A-Z0-9}}}}}',	'',	1,	2),
(50,	'Dr. Al Beahan Kerluke',	'{A-Z0-9}}}}}',	'',	1,	2),
(51,	'Mr. Lucas Toy Jr. Bogisich',	'{A-Z0-9}}}}}',	'',	4,	2),
(52,	'Patrick Gutmann Boyle',	'{A-Z0-9}}}}}',	'',	4,	2),
(53,	'Fabiola Senger Wiza',	'{A-Z0-9}}}}}',	'',	4,	2),
(54,	'Prof. Reginald Raynor DDS Friesen',	'{A-Z0-9}}}}}',	'',	2,	2),
(55,	'Silas Hane DVM Cummerata',	'{A-Z0-9}}}}}',	'',	4,	2),
(56,	'Alta Stanton Hodkiewicz',	'{A-Z0-9}}}}}',	'',	2,	2),
(57,	'Prof. Brenden Bednar III Hilll',	'{A-Z0-9}}}}}',	'',	3,	2),
(58,	'Malika Kemmer Heller',	'{A-Z0-9}}}}}',	'',	1,	2),
(59,	'Stefan Pollich Rodriguez',	'{A-Z0-9}}}}}',	'',	4,	2),
(60,	'Austin Wehner Hodkiewicz',	'{A-Z0-9}}}}}',	'',	4,	2),
(61,	'Prof. Otilia Kerluke Strosin',	'{A-Z0-9}}}}}',	'',	3,	2),
(62,	'Janie Kozey Howell',	'{A-Z0-9}}}}}',	'',	2,	2),
(63,	'Mrs. Abagail Gorczany Schuppe',	'{A-Z0-9}}}}}',	'',	4,	2),
(64,	'Ms. Sydni Ullrich Flatley',	'{A-Z0-9}}}}}',	'',	2,	2),
(65,	'Jeff Franecki O\'Hara',	'{A-Z0-9}}}}}',	'',	2,	2),
(66,	'Deon Koelpin DVM Wolf',	'{A-Z0-9}}}}}',	'',	4,	2),
(67,	'Lilian Jakubowski Pollich',	'{A-Z0-9}}}}}',	'',	1,	2),
(68,	'Shea Braun IV Kassulke',	'{A-Z0-9}}}}}',	'',	1,	2),
(69,	'Prof. River Balistreri Hoeger',	'{A-Z0-9}}}}}',	'',	2,	2),
(70,	'Alexa Marvin MD Carroll',	'{A-Z0-9}}}}}',	'',	1,	2),
(71,	'Jose Fisher Cremin',	'{A-Z0-9}}}}}',	'',	1,	2),
(72,	'Ressie Stokes Hoeger',	'{A-Z0-9}}}}}',	'',	2,	2),
(73,	'Lavonne Schulist Jr. Howell',	'{A-Z0-9}}}}}',	'',	3,	2),
(74,	'Mrs. Lelia Parisian Jr. Crona',	'{A-Z0-9}}}}}',	'',	1,	2),
(75,	'Ericka Ryan Sr. Sawayn',	'{A-Z0-9}}}}}',	'',	2,	2),
(76,	'Terry Zulauf Willms',	'{A-Z0-9}}}}}',	'',	2,	2),
(77,	'Dina Altenwerth Kreiger',	'{A-Z0-9}}}}}',	'',	1,	2),
(78,	'Katlynn Waters Bahringer',	'{A-Z0-9}}}}}',	'',	1,	2),
(79,	'Rudolph Schowalter Homenick',	'{A-Z0-9}}}}}',	'',	1,	2),
(83,	'Russell Tun',	'MESC040618HY',	'',	2,	2),
(84,	'Yuliana',	'MESC040618HY',	'fotos/foto-1633108490.jpg',	4,	2),
(85,	'Russell',	'Rias es mi p',	'fotos/foto-1633109513.jpg',	4,	7),
(88,	'Russell Tun',	'MESC040618HY',	'fotos/foto-1636676297.png',	4,	10),
(89,	'Maha',	'HBIPUER8G8VG',	'fotos/foto-1638460547.jpg',	2,	8);

CREATE TABLE `porcentajexsucursal` (
  `idporcentaje` int(11) NOT NULL AUTO_INCREMENT,
  `fkSucursal` int(11) NOT NULL,
  `porcentaje` double NOT NULL,
  PRIMARY KEY (`idporcentaje`),
  KEY `fkSucursal` (`fkSucursal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `porcentajexsucursal` (`idporcentaje`, `fkSucursal`, `porcentaje`) VALUES
(1,	1,	0.5),
(2,	2,	0.1),
(3,	3,	0.15),
(4,	4,	0.2);

CREATE TABLE `porcentajextiposocio` (
  `idporcentaje_type` int(11) NOT NULL AUTO_INCREMENT,
  `fktiposocio` int(11) NOT NULL,
  `porcentaje_tipo` double NOT NULL,
  PRIMARY KEY (`idporcentaje_type`),
  KEY `fktiposocio` (`fktiposocio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `puntos` (
  `idpuntos` int(11) NOT NULL AUTO_INCREMENT,
  `fkSucursal` int(11) NOT NULL,
  `fkSocio` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  PRIMARY KEY (`idpuntos`),
  KEY `fkSucursal` (`fkSucursal`),
  KEY `fkSocio` (`fkSocio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `puntos` (`idpuntos`, `fkSucursal`, `fkSocio`, `puntos`) VALUES
(1,	0,	3,	50),
(2,	1,	3,	50),
(3,	4,	3,	34),
(4,	4,	3,	34),
(5,	4,	4,	60),
(6,	2,	6,	30),
(7,	2,	7,	30),
(8,	3,	8,	45),
(9,	1,	9,	150),
(10,	3,	8,	45),
(11,	3,	6,	45);

CREATE TABLE `puntos_socio` (
  `idpuntos_socio` int(11) NOT NULL AUTO_INCREMENT,
  `idsocio` int(11) NOT NULL,
  `totals` float NOT NULL,
  PRIMARY KEY (`idpuntos_socio`),
  KEY `idsocio` (`idsocio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `puntos_socio` (`idpuntos_socio`, `idsocio`, `totals`) VALUES
(1,	5,	2550),
(2,	7,	120);

CREATE TABLE `puntos_sucursal` (
  `idpuntossu` int(11) NOT NULL AUTO_INCREMENT,
  `fksucursal` int(11) NOT NULL,
  `puntos` float NOT NULL,
  PRIMARY KEY (`idpuntossu`),
  KEY `idsucursal` (`fksucursal`),
  CONSTRAINT `puntos_sucursal_ibfk_1` FOREIGN KEY (`fksucursal`) REFERENCES `sucursal` (`idsucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `puntos_sucursal` (`idpuntossu`, `fksucursal`, `puntos`) VALUES
(9,	4,	840),
(10,	1,	600);

CREATE TABLE `renta` (
  `idrenta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `idsocio` int(11) NOT NULL,
  PRIMARY KEY (`idrenta`),
  KEY `idsocio` (`idsocio`),
  CONSTRAINT `renta_ibfk_1` FOREIGN KEY (`idsocio`) REFERENCES `socio` (`idsocio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `renta` (`idrenta`, `fecha_inicio`, `fecha_fin`, `precio`, `idsocio`) VALUES
(1,	'2021-11-08',	'2021-12-08',	350.00,	3),
(2,	'2021-11-08',	'2021-12-08',	300.00,	1),
(3,	'2021-11-08',	'2021-12-08',	500.00,	3),
(4,	'2022-03-09',	'2022-04-09',	500.00,	5),
(5,	'2022-03-10',	'2022-04-10',	300.00,	7);

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rol` (`idrol`, `nombre`) VALUES
(1,	'Gerente'),
(2,	'Administrativo'),
(3,	'Personal'),
(4,	'Socio');

CREATE TABLE `rolxpermiso` (
  `idrol` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  KEY `idrol` (`idrol`),
  KEY `idpermiso` (`idpermiso`),
  CONSTRAINT `rolxpermiso_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`),
  CONSTRAINT `rolxpermiso_ibfk_2` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`idpermiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rolxpermiso` (`idrol`, `idpermiso`) VALUES
(1,	2),
(1,	3),
(1,	5),
(1,	8),
(3,	1),
(3,	5),
(3,	6),
(3,	7),
(3,	11),
(2,	1),
(2,	2),
(2,	3),
(2,	4),
(2,	5),
(2,	6),
(2,	7),
(2,	8),
(2,	9),
(2,	10),
(2,	11),
(2,	12),
(2,	13),
(2,	14),
(2,	15);

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(9) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `anio` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `idtiposervicio` int(11) NOT NULL,
  `idsocio` int(11) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_atencion_inicial` datetime DEFAULT NULL,
  `fecha_atencion_final` datetime DEFAULT NULL,
  `idestacion` int(11) NOT NULL,
  `idhorario` int(11) NOT NULL,
  `origen` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idservicio`),
  KEY `idtiposervicio` (`idtiposervicio`),
  KEY `idsocio` (`idsocio`),
  KEY `idpersonal` (`idpersonal`),
  CONSTRAINT `servicio_ibfk_3` FOREIGN KEY (`idsocio`) REFERENCES `socio` (`idsocio`),
  CONSTRAINT `servicio_ibfk_4` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`),
  CONSTRAINT `servicio_ibfk_5` FOREIGN KEY (`idtiposervicio`) REFERENCES `tipo_servicio` (`idtiposervicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `servicio` (`idservicio`, `placa`, `modelo`, `anio`, `precio`, `idpersonal`, `idtiposervicio`, `idsocio`, `fecha_creacion`, `fecha_atencion_inicial`, `fecha_atencion_final`, `idestacion`, `idhorario`, `origen`, `status`) VALUES
(132,	'YDO-5685',	'BMW',	2019,	200,	5,	3,	3,	'2021-10-29 10:56:35',	'2022-03-01 11:00:00',	'2021-11-01 12:00:00',	1,	2,	'WEB',	2),
(133,	'YRB-9070',	'Mercedez-Benz',	2020,	300,	47,	4,	1,	'2021-10-16 00:04:35',	'2021-10-19 11:00:00',	'2021-10-19 12:00:00',	2,	2,	'APP',	1),
(134,	'YZV-5544',	'Chevrolet',	2021,	200,	74,	3,	3,	'2021-08-28 20:30:32',	'2021-08-30 10:00:00',	'2021-08-30 11:00:00',	2,	1,	'WEB',	1),
(135,	'YGL-8719',	'BMW',	2021,	200,	57,	3,	1,	'2021-09-07 15:13:39',	'2021-09-08 11:00:00',	'2021-09-08 12:00:00',	1,	2,	'APP',	1),
(136,	'YUR-7779',	'Chevrolet',	2019,	170,	36,	2,	3,	'2021-07-26 23:22:34',	'2022-03-03 11:00:00',	'2021-07-27 12:00:00',	3,	2,	'WEB',	2),
(137,	'YFF-4766',	'Mercedez-Benz',	2021,	170,	30,	2,	1,	'2021-07-29 09:16:26',	'2021-07-31 11:00:00',	'2021-07-31 12:00:00',	2,	2,	'APP',	1),
(138,	'YDK-1770',	'Tesla',	2019,	300,	52,	4,	5,	'2021-08-31 01:50:21',	'2022-03-03 11:00:00',	'2021-09-04 12:00:00',	3,	2,	'APP',	1),
(139,	'YPI-7768',	'Ford',	2020,	200,	78,	3,	1,	'2021-09-17 04:46:45',	'2021-09-21 11:00:00',	'2021-09-21 12:00:00',	3,	2,	'WEB',	1),
(140,	'YYR-7497',	'Ford',	2018,	300,	55,	4,	3,	'2021-10-14 19:24:42',	'2021-10-16 11:00:00',	'2021-10-16 12:00:00',	1,	2,	'WEB',	1),
(141,	'YSE-3504',	'Chevrolet',	2019,	300,	59,	4,	5,	'2021-11-10 06:48:40',	'2021-11-15 11:00:00',	'2021-11-15 12:00:00',	1,	2,	'WEB',	1),
(142,	'YVK-1762',	'Tesla',	2020,	300,	45,	4,	5,	'2021-08-25 05:06:52',	'2021-08-26 11:00:00',	'2021-08-26 12:00:00',	3,	2,	'APP',	1),
(143,	'YMB-9152',	'BMW',	2020,	300,	77,	4,	3,	'2021-08-03 11:59:39',	'2022-03-20 11:00:00',	'2021-08-08 12:00:00',	3,	2,	'APP',	1),
(144,	'YXG-8453',	'Chevrolet',	2020,	100,	85,	1,	4,	'2021-10-11 12:16:25',	'2021-10-15 11:00:00',	'2021-10-15 12:00:00',	1,	2,	'APP',	1),
(145,	'YNM-6588',	'Chevrolet',	2018,	170,	31,	2,	5,	'2021-09-29 20:28:35',	'2021-09-30 11:00:00',	'2021-09-30 12:00:00',	2,	2,	'LOCAL',	1),
(146,	'YHW-1136',	'Ford',	2021,	100,	68,	1,	1,	'2021-10-30 13:48:56',	'2022-03-20 10:00:00',	'2021-11-04 11:00:00',	2,	1,	'APP',	1),
(147,	'YTF-3463',	'Chevrolet',	2020,	100,	43,	1,	5,	'2021-11-07 22:06:29',	'2021-11-12 11:00:00',	'2021-11-12 12:00:00',	2,	2,	'LOCAL',	1),
(148,	'YOR-2386',	'Mercedez-Benz',	2021,	200,	57,	3,	5,	'2021-10-06 08:39:31',	'2021-10-08 10:00:00',	'2021-10-08 11:00:00',	3,	1,	'LOCAL',	1),
(149,	'YXH-9980',	'Ford',	2019,	170,	67,	2,	1,	'2021-09-23 15:16:29',	'2021-09-28 11:00:00',	'2021-09-28 12:00:00',	3,	2,	'WEB',	1),
(150,	'YYR-4039',	'Tesla',	2020,	200,	61,	3,	3,	'2021-09-11 05:37:19',	'2021-09-15 11:00:00',	'2021-09-15 12:00:00',	2,	2,	'APP',	1),
(151,	'YOI-5850',	'BMW',	2020,	200,	72,	3,	3,	'2021-11-11 01:28:30',	'2021-11-14 10:00:00',	'2021-11-14 11:00:00',	2,	1,	'APP',	1),
(152,	'YQU-6854',	'BMW',	2020,	170,	73,	2,	4,	'2021-08-24 10:25:44',	'2021-08-25 10:00:00',	'2021-08-25 11:00:00',	1,	1,	'WEB',	1),
(153,	'YYM-0037',	'Nissa',	2020,	300,	43,	4,	4,	'2021-11-16 17:55:39',	'2021-11-17 11:00:00',	'2021-11-17 12:00:00',	1,	2,	'APP',	1),
(154,	'YEQ-0103',	'Mercedez-Benz',	2020,	300,	49,	4,	4,	'2021-11-03 22:33:14',	'2021-11-08 10:00:00',	'2021-11-08 11:00:00',	3,	1,	'WEB',	1),
(155,	'YEV-0267',	'Nissa',	2018,	170,	49,	2,	4,	'2021-08-27 02:18:35',	'2021-08-30 11:00:00',	'2021-08-30 12:00:00',	1,	2,	'WEB',	1),
(156,	'YPU-5376',	'Mercedez-Benz',	2021,	200,	83,	3,	5,	'2021-09-11 17:24:15',	'2021-09-13 10:00:00',	'2021-09-13 11:00:00',	3,	1,	'LOCAL',	1),
(157,	'YPH-1792',	'Nissa',	2021,	300,	51,	4,	1,	'2021-09-08 01:57:11',	'2021-09-11 11:00:00',	'2021-09-11 12:00:00',	3,	2,	'APP',	1),
(158,	'YKW-8483',	'Mazda',	2021,	200,	60,	3,	5,	'2021-10-26 09:26:20',	'2021-10-31 11:00:00',	'2021-10-31 12:00:00',	1,	2,	'APP',	1),
(159,	'YXF-3360',	'Honda',	2018,	170,	66,	2,	5,	'2021-07-31 09:56:48',	'2021-08-02 11:00:00',	'2021-08-02 12:00:00',	2,	2,	'LOCAL',	1),
(160,	'YXS-9686',	'Chevrolet',	2020,	300,	54,	4,	1,	'2021-09-22 20:04:34',	'2021-09-23 10:00:00',	'2021-09-23 11:00:00',	2,	1,	'WEB',	1),
(161,	'YYX-5933',	'Chevrolet',	2020,	300,	52,	4,	1,	'2021-10-21 19:38:34',	'2021-10-24 10:00:00',	'2021-10-24 11:00:00',	2,	1,	'APP',	1),
(162,	'YBI-3117',	'Mazda',	2018,	200,	88,	3,	4,	'2021-09-13 09:03:55',	'2021-09-17 11:00:00',	'2021-09-17 12:00:00',	3,	2,	'WEB',	1),
(163,	'YYV-7604',	'Mazda',	2020,	170,	74,	2,	3,	'2021-10-20 11:21:04',	'2021-10-23 11:00:00',	'2021-10-23 12:00:00',	3,	2,	'APP',	1),
(164,	'YZX-3069',	'Ford',	2021,	170,	70,	2,	1,	'2021-09-11 18:29:33',	'2021-09-13 10:00:00',	'2021-09-13 11:00:00',	1,	1,	'APP',	1),
(165,	'YUX-0334',	'BMW',	2019,	200,	62,	3,	4,	'2021-08-20 07:06:58',	'2021-08-22 11:00:00',	'2021-08-22 12:00:00',	3,	2,	'LOCAL',	1),
(166,	'YMO-6001',	'Mazda',	2018,	200,	61,	3,	3,	'2021-09-29 18:33:28',	'2021-10-01 10:00:00',	'2021-10-01 11:00:00',	1,	1,	'LOCAL',	1),
(167,	'YRX-5093',	'Mazda',	2018,	170,	51,	2,	5,	'2021-09-01 20:00:02',	'2021-09-02 11:00:00',	'2021-09-02 12:00:00',	3,	2,	'APP',	1),
(168,	'YAV-8113',	'Mercedez-Benz',	2020,	170,	3,	2,	4,	'2021-08-12 13:06:16',	'2021-08-17 11:00:00',	'2021-08-17 12:00:00',	1,	2,	'WEB',	1),
(169,	'YDL-5788',	'Chevrolet',	2019,	300,	51,	4,	5,	'2021-09-29 15:14:26',	'2021-10-02 10:00:00',	'2021-10-02 11:00:00',	1,	1,	'LOCAL',	1),
(170,	'YTH-6940',	'BMW',	2018,	200,	70,	3,	4,	'2021-08-17 11:42:47',	'2021-08-20 10:00:00',	'2021-08-20 11:00:00',	3,	1,	'LOCAL',	1),
(171,	'YSA-9377',	'Ford',	2019,	100,	43,	1,	1,	'2021-08-05 05:15:50',	'2021-08-06 10:00:00',	'2021-08-06 11:00:00',	3,	1,	'LOCAL',	1),
(172,	'YJN-6660',	'Chevrolet',	2020,	170,	56,	2,	1,	'2021-09-30 19:34:32',	'2021-10-04 11:00:00',	'2021-10-04 12:00:00',	1,	2,	'WEB',	1),
(173,	'YOR-0897',	'Ford',	2019,	200,	83,	3,	1,	'2021-08-28 22:25:49',	'2021-09-02 10:00:00',	'2021-09-02 11:00:00',	1,	1,	'APP',	1),
(174,	'YFE-9295',	'Mercedez-Benz',	2020,	300,	76,	4,	3,	'2021-07-27 08:17:24',	'2021-07-29 10:00:00',	'2021-07-29 11:00:00',	3,	1,	'LOCAL',	1),
(175,	'YRE-1359',	'Nissa',	2020,	300,	3,	4,	5,	'2021-10-06 15:53:55',	'2021-10-09 10:00:00',	'2021-10-09 11:00:00',	1,	1,	'LOCAL',	1),
(176,	'YPD-5822',	'Chevrolet',	2018,	200,	52,	3,	3,	'2021-08-31 18:34:21',	'2021-09-02 11:00:00',	'2021-09-02 12:00:00',	1,	2,	'LOCAL',	1),
(177,	'YUE-8905',	'Chevrolet',	2019,	170,	85,	2,	1,	'2021-10-24 16:04:01',	'2021-10-26 10:00:00',	'2021-10-26 11:00:00',	1,	1,	'APP',	1),
(178,	'YHE-9105',	'Honda',	2018,	200,	30,	3,	1,	'2021-09-30 01:38:52',	'2021-10-04 11:00:00',	'2021-10-04 12:00:00',	3,	2,	'WEB',	1),
(179,	'YBU-9040',	'Honda',	2019,	200,	63,	3,	3,	'2021-10-24 06:06:14',	'2021-10-27 10:00:00',	'2021-10-27 11:00:00',	3,	1,	'LOCAL',	1),
(180,	'YPY-4226',	'Mazda',	2020,	100,	83,	1,	5,	'2021-11-18 13:16:45',	'2021-11-21 10:00:00',	'2021-11-21 11:00:00',	2,	1,	'WEB',	1),
(181,	'YFT-8531',	'Chevrolet',	2021,	170,	53,	2,	1,	'2021-08-27 06:33:06',	'2021-08-31 11:00:00',	'2021-08-31 12:00:00',	1,	2,	'LOCAL',	1),
(182,	'YZG-9776',	'Honda',	2018,	200,	31,	3,	1,	'2021-08-13 11:21:38',	'2021-08-14 11:00:00',	'2021-08-14 12:00:00',	3,	2,	'APP',	1),
(183,	'YZF-3388',	'Ford',	2018,	200,	79,	3,	3,	'2021-08-27 09:04:35',	'2021-09-01 11:00:00',	'2021-09-01 12:00:00',	3,	2,	'LOCAL',	1),
(184,	'YPH-2250',	'Ford',	2021,	200,	68,	3,	5,	'2021-09-12 16:58:08',	'2021-09-14 10:00:00',	'2021-09-14 11:00:00',	3,	1,	'LOCAL',	1),
(185,	'YJE-9879',	'Mercedez-Benz',	2018,	100,	58,	1,	3,	'2021-11-05 10:30:46',	'2021-11-10 10:00:00',	'2021-11-10 11:00:00',	3,	1,	'APP',	1),
(186,	'YET-0093',	'Nissa',	2018,	300,	45,	4,	4,	'2021-10-12 03:11:06',	'2021-10-17 10:00:00',	'2021-10-17 11:00:00',	3,	1,	'WEB',	1),
(187,	'YPB-1198',	'Chevrolet',	2019,	200,	31,	3,	4,	'2021-08-11 01:27:34',	'2021-08-16 10:00:00',	'2021-08-16 11:00:00',	3,	1,	'WEB',	1),
(188,	'YLG-4549',	'BMW',	2018,	170,	37,	2,	1,	'2021-09-18 16:49:16',	'2021-09-20 11:00:00',	'2021-09-20 12:00:00',	2,	2,	'WEB',	1),
(189,	'YIJ-3250',	'Mercedez-Benz',	2021,	100,	67,	1,	1,	'2021-09-21 08:02:37',	'2021-09-26 11:00:00',	'2021-09-26 12:00:00',	1,	2,	'LOCAL',	1),
(190,	'YWF-1357',	'Nissa',	2018,	170,	37,	2,	1,	'2021-09-20 17:25:41',	'2021-09-25 11:00:00',	'2021-09-25 12:00:00',	1,	2,	'WEB',	1),
(191,	'YKJ-2094',	'Chevrolet',	2019,	100,	33,	1,	5,	'2021-09-06 23:07:20',	'2021-09-09 11:00:00',	'2021-09-09 12:00:00',	1,	2,	'WEB',	1),
(192,	'YGF-1999',	'Mercedez-Benz',	2021,	170,	61,	2,	3,	'2021-09-18 10:31:38',	'2021-09-21 10:00:00',	'2021-09-21 11:00:00',	3,	1,	'APP',	1),
(193,	'YUB-2340',	'Honda',	2020,	200,	49,	3,	4,	'2021-11-01 23:32:53',	'2021-11-04 10:00:00',	'2021-11-04 11:00:00',	3,	1,	'APP',	1),
(194,	'YNJ-6961',	'Mazda',	2018,	100,	66,	1,	4,	'2021-09-04 10:55:52',	'2021-09-07 10:00:00',	'2021-09-07 11:00:00',	2,	1,	'WEB',	1),
(195,	'YHO-6157',	'Honda',	2020,	100,	83,	1,	4,	'2021-11-24 23:39:14',	'2021-11-29 10:00:00',	'2021-11-29 11:00:00',	2,	1,	'WEB',	1),
(196,	'YEH-1326',	'Nissa',	2019,	100,	3,	1,	4,	'2021-11-04 00:21:16',	'2021-11-08 11:00:00',	'2021-11-08 12:00:00',	2,	2,	'LOCAL',	1),
(197,	'YBP-9151',	'Ford',	2019,	100,	31,	1,	5,	'2021-08-09 11:24:05',	'2021-08-12 11:00:00',	'2021-08-12 12:00:00',	1,	2,	'LOCAL',	1),
(198,	'YEG-9500',	'Ford',	2018,	300,	48,	4,	3,	'2021-09-28 21:07:06',	'2021-10-03 10:00:00',	'2021-10-03 11:00:00',	3,	1,	'LOCAL',	1),
(199,	'YLE-6113',	'BMW',	2021,	300,	88,	4,	4,	'2021-10-08 19:09:24',	'2021-10-11 10:00:00',	'2021-10-11 11:00:00',	1,	1,	'LOCAL',	1),
(200,	'YSL-0627',	'Honda',	2019,	300,	5,	4,	5,	'2021-11-13 15:20:57',	'2021-11-16 11:00:00',	'2021-11-16 12:00:00',	2,	2,	'LOCAL',	1),
(201,	'YUI-9530',	'Mercedez-Benz',	2018,	200,	5,	3,	3,	'2021-10-23 05:03:34',	'2021-10-26 10:00:00',	'2021-10-26 11:00:00',	2,	1,	'APP',	1),
(202,	'YYH-8685',	'Mazda',	2019,	100,	32,	1,	3,	'2021-10-19 12:22:28',	'2021-10-20 10:00:00',	'2021-10-20 11:00:00',	2,	1,	'APP',	1),
(203,	'YVP-3168',	'Tesla',	2019,	170,	44,	2,	4,	'2021-11-10 21:59:01',	'2021-11-13 10:00:00',	'2021-11-13 11:00:00',	3,	1,	'WEB',	1),
(204,	'YVA-7075',	'Tesla',	2018,	100,	53,	1,	4,	'2021-09-12 16:48:31',	'2021-09-17 10:00:00',	'2021-09-17 11:00:00',	2,	1,	'LOCAL',	1),
(205,	'YFE-2917',	'Mercedez-Benz',	2018,	170,	40,	2,	3,	'2021-08-20 09:53:03',	'2021-08-24 10:00:00',	'2021-08-24 11:00:00',	2,	1,	'LOCAL',	1),
(206,	'YIB-4304',	'Mazda',	2020,	200,	6,	3,	3,	'2021-11-24 05:45:24',	'2021-11-26 10:00:00',	'2021-11-26 11:00:00',	2,	1,	'WEB',	1),
(207,	'YCR-7824',	'Ford',	2020,	200,	57,	3,	4,	'2021-09-28 09:19:57',	'2021-09-30 10:00:00',	'2021-09-30 11:00:00',	2,	1,	'APP',	1),
(208,	'YSJ-5091',	'Chevrolet',	2021,	170,	61,	2,	5,	'2021-08-25 22:10:05',	'2021-08-29 10:00:00',	'2021-08-29 11:00:00',	2,	1,	'LOCAL',	1),
(209,	'YRC-1906',	'Mercedez-Benz',	2020,	100,	1,	1,	4,	'2021-08-20 10:43:05',	'2021-08-24 10:00:00',	'2021-08-24 11:00:00',	3,	1,	'WEB',	1),
(210,	'YLN-9452',	'Honda',	2020,	100,	85,	1,	3,	'2021-08-17 06:46:36',	'2021-08-22 10:00:00',	'2021-08-22 11:00:00',	1,	1,	'WEB',	1),
(211,	'YZE-5936',	'Mercedez-Benz',	2018,	200,	40,	3,	4,	'2021-09-04 14:09:03',	'2021-09-07 11:00:00',	'2021-09-07 12:00:00',	2,	2,	'LOCAL',	1),
(212,	'YJM-7875',	'Nissa',	2021,	170,	53,	2,	1,	'2021-10-07 02:37:34',	'2021-10-12 11:00:00',	'2021-10-12 12:00:00',	3,	2,	'LOCAL',	1),
(213,	'YGK-9834',	'Mazda',	2020,	170,	40,	2,	3,	'2021-09-03 06:57:45',	'2021-09-07 10:00:00',	'2021-09-07 11:00:00',	1,	1,	'WEB',	1),
(214,	'YUP-8809',	'Tesla',	2019,	200,	43,	3,	1,	'2021-08-04 03:55:50',	'2021-08-07 11:00:00',	'2021-08-07 12:00:00',	1,	2,	'APP',	1),
(215,	'YKD-1855',	'Honda',	2019,	100,	30,	1,	1,	'2021-08-04 07:46:48',	'2021-08-08 10:00:00',	'2021-08-08 11:00:00',	3,	1,	'APP',	1),
(216,	'YFV-8165',	'Mazda',	2019,	170,	85,	2,	1,	'2021-10-30 07:04:23',	'2021-11-02 10:00:00',	'2021-11-02 11:00:00',	1,	1,	'WEB',	1),
(217,	'YCS-5497',	'Ford',	2019,	200,	69,	3,	3,	'2021-08-22 23:14:15',	'2021-08-24 11:00:00',	'2021-08-24 12:00:00',	2,	2,	'WEB',	1),
(218,	'YQA-4852',	'BMW',	2018,	300,	79,	4,	3,	'2021-10-30 03:46:24',	'2021-11-03 10:00:00',	'2021-11-03 11:00:00',	3,	1,	'WEB',	1),
(219,	'YFC-8211',	'Mazda',	2018,	200,	54,	3,	5,	'2021-10-13 06:09:02',	'2021-10-14 10:00:00',	'2021-10-14 11:00:00',	2,	1,	'WEB',	1),
(220,	'YYA-4421',	'Mazda',	2018,	200,	58,	3,	4,	'2021-08-06 01:02:36',	'2021-08-07 10:00:00',	'2021-08-07 11:00:00',	2,	1,	'LOCAL',	1),
(221,	'YPJ-9824',	'Honda',	2018,	100,	69,	1,	3,	'2021-09-25 14:44:48',	'2021-09-26 10:00:00',	'2021-09-26 11:00:00',	3,	1,	'LOCAL',	1),
(222,	'YUS-3151',	'Tesla',	2018,	300,	64,	4,	4,	'2021-10-09 11:25:10',	'2021-10-13 11:00:00',	'2021-10-13 12:00:00',	2,	2,	'WEB',	1),
(223,	'YOH-2415',	'Ford',	2020,	300,	72,	4,	1,	'2021-08-22 16:48:39',	'2021-08-25 10:00:00',	'2021-08-25 11:00:00',	3,	1,	'LOCAL',	1),
(224,	'YCY-3439',	'Honda',	2018,	100,	56,	1,	3,	'2021-11-17 14:38:22',	'2021-11-18 11:00:00',	'2021-11-18 12:00:00',	3,	2,	'LOCAL',	1),
(225,	'YWP-6258',	'Mazda',	2020,	100,	34,	1,	3,	'2021-11-10 08:00:07',	'2021-11-12 10:00:00',	'2021-11-12 11:00:00',	2,	1,	'LOCAL',	1),
(226,	'YKW-4399',	'BMW',	2018,	200,	46,	3,	3,	'2021-11-24 14:31:39',	'2021-11-29 11:00:00',	'2021-11-29 12:00:00',	1,	2,	'APP',	1),
(227,	'YDJ-1186',	'BMW',	2021,	300,	34,	4,	1,	'2021-11-12 23:22:26',	'2021-11-15 11:00:00',	'2021-11-15 12:00:00',	2,	2,	'LOCAL',	1),
(228,	'YYD-2175',	'BMW',	2020,	170,	72,	2,	1,	'2021-11-06 11:10:25',	'2021-11-08 11:00:00',	'2021-11-08 12:00:00',	1,	2,	'LOCAL',	1),
(229,	'YUO-6776',	'BMW',	2021,	300,	63,	4,	1,	'2021-11-19 07:37:30',	'2021-11-20 10:00:00',	'2021-11-20 11:00:00',	2,	1,	'LOCAL',	1),
(230,	'YWE-3655',	'Tesla',	2019,	170,	65,	2,	4,	'2021-07-30 03:06:14',	'2021-08-03 11:00:00',	'2021-08-03 12:00:00',	2,	2,	'WEB',	1),
(231,	'YZT-1229',	'Mercedez-Benz',	2020,	100,	53,	1,	4,	'2021-08-25 01:35:05',	'2021-08-26 10:00:00',	'2021-08-26 11:00:00',	2,	1,	'APP',	1),
(332,	'YII-0463',	'Nissa',	2020,	200,	62,	3,	1,	'2021-10-18 10:45:22',	'2021-10-22 10:00:00',	'2021-10-22 11:00:00',	2,	1,	'APP',	2),
(333,	'YCV-5207',	'Mercedez-Benz',	2018,	100,	45,	1,	8,	'2021-08-09 16:09:56',	'2021-08-11 13:00:00',	'2021-08-11 14:00:00',	1,	4,	'WEB',	1),
(334,	'YEX-6272',	'Honda',	2019,	300,	43,	4,	1,	'2021-09-20 17:20:40',	'2021-09-23 11:00:00',	'2021-09-23 12:00:00',	2,	2,	'WEB',	1),
(335,	'KRR-980',	'Mercedez-Benz',	2018,	1600,	2,	2,	1,	'2021-12-03 17:59:08',	'2021-02-14 13:00:00',	'2021-02-14 14:00:00',	2,	4,	'LOCAL',	2),
(336,	'KRR-980',	'Mercedez-Benz',	2018,	1600,	2,	2,	1,	'2021-12-03 17:59:57',	'2021-10-29 13:00:00',	'2021-10-29 14:00:00',	2,	4,	'LOCAL',	1),
(337,	'KRR-980',	'Mercedez-Benz',	2018,	1600,	2,	2,	1,	'2021-12-03 18:01:09',	'2021-10-29 11:00:00',	'2021-10-29 12:00:00',	2,	2,	'LOCAL',	1),
(338,	'KRR-980',	'Mercedez-Benz',	2018,	1600,	2,	2,	1,	'2021-12-03 18:01:31',	'2021-10-29 11:00:00',	'2021-10-29 12:00:00',	1,	2,	'LOCAL',	1),
(339,	'KRS-A56',	'Mercedez-benz',	2021,	300,	1,	2,	5,	'2021-12-03 20:16:51',	'2021-10-29 10:00:00',	'2021-10-29 11:00:00',	2,	1,	'WEB',	1),
(340,	'PRUE-21',	'PRUEBA',	2021,	300,	2,	4,	4,	'2021-12-04 01:50:49',	'2021-12-24 15:00:00',	'2021-12-24 16:00:00',	4,	6,	'APP',	1),
(341,	'JPY-456',	'prueba',	2020,	300,	38,	3,	8,	'2021-12-03 20:09:19',	NULL,	'2021-12-04 00:00:00',	0,	0,	'',	1),
(342,	'KRS-A56',	'Mazda 6',	2021,	500,	3,	3,	7,	'2022-03-01 00:53:04',	'2022-02-16 14:00:00',	'2022-02-16 15:00:00',	3,	5,	'WEB',	2),
(343,	'YFW542',	'Mercedez',	2020,	200,	2,	3,	5,	'2022-03-05 06:39:14',	'2022-03-03 10:00:00',	'2022-03-03 11:00:00',	1,	1,	'LOCAL',	1),
(344,	'YWZ456',	'Ford',	2007,	200,	2,	3,	5,	'2022-03-06 15:23:01',	'2022-03-06 10:00:00',	'2022-03-06 11:00:00',	4,	1,	'LOCAL',	1),
(345,	'ABC323',	'BMW',	2020,	300,	6,	4,	4,	'2022-03-06 15:55:20',	'2022-03-10 12:00:00',	'2022-03-10 13:00:00',	2,	3,	'LOCAL',	2),
(349,	'RRRRRR',	'Mercedes Benz',	2020,	170,	6,	2,	5,	'2022-03-06 17:39:41',	'2022-03-10 13:00:00',	'2022-03-10 14:00:00',	4,	4,	'LOCAL',	2),
(350,	'RRRRR',	'Mazda 6',	2020,	300,	1,	4,	3,	'2022-03-06 22:56:04',	'2022-03-17 11:00:00',	'2022-03-17 12:00:00',	3,	2,	'LOCAL',	1),
(351,	'oiehfioh',	'wuieff',	2147483647,	170,	1,	2,	3,	'2022-03-06 22:57:17',	'2022-03-03 10:00:00',	'2022-03-03 11:00:00',	3,	1,	'LOCAL',	2),
(352,	'frtghyt',	'dutyh',	5436,	100,	4,	1,	3,	'2022-03-06 23:02:11',	'2022-03-04 14:00:00',	'2022-03-04 15:00:00',	4,	5,	'LOCAL',	1),
(353,	'ttgfder',	'dfghjk',	2345,	170,	1,	2,	3,	'2022-03-06 23:02:58',	'2022-03-10 12:00:00',	'2022-03-10 13:00:00',	4,	3,	'LOCAL',	1),
(354,	'gfhjik',	'rtyuio',	0,	170,	1,	2,	3,	'2022-03-06 23:04:53',	'2022-03-10 10:00:00',	'2022-03-10 11:00:00',	2,	1,	'LOCAL',	1),
(355,	'Hola',	'Hola',	2005,	300,	1,	4,	4,	'2022-03-06 23:11:11',	'2022-03-18 10:00:00',	'2022-03-18 11:00:00',	2,	1,	'LOCAL',	1),
(356,	'GGGGG',	'Mazda 696',	2021,	300,	3,	4,	6,	'2022-03-07 01:50:54',	'2022-03-18 10:00:00',	'2022-03-18 11:00:00',	4,	1,	'LOCAL',	1),
(357,	'ZZZZZ',	'Mazda 696',	2021,	200,	3,	3,	5,	'2022-03-07 01:58:13',	'2022-03-18 10:00:00',	'2022-03-18 11:00:00',	1,	1,	'LOCAL',	1),
(358,	'LLLLL',	'Mazda 700',	2022,	300,	3,	4,	7,	'2022-03-07 01:59:23',	'2022-03-18 11:00:00',	'2022-03-18 12:00:00',	3,	2,	'LOCAL',	1),
(359,	'YWO555',	'BMW',	2015,	300,	6,	4,	8,	'2022-03-07 16:30:56',	'2022-03-07 13:00:00',	'2022-03-07 14:00:00',	2,	4,	'LOCAL',	1),
(360,	'HYM564',	'Fiesta',	2015,	300,	4,	4,	9,	'2022-03-08 04:07:55',	'2022-03-17 11:00:00',	'2022-03-17 12:00:00',	1,	2,	'LOCAL',	1),
(361,	'FFFFFF',	'Ford',	2005,	300,	5,	4,	8,	'2022-03-08 04:18:14',	'2022-03-03 11:00:00',	'2022-03-03 12:00:00',	1,	2,	'LOCAL',	1),
(362,	'HHHHHH',	'HHHHHH',	2002,	300,	5,	4,	6,	'2022-03-08 04:20:48',	'2022-03-03 12:00:00',	'2022-03-03 13:00:00',	2,	3,	'LOCAL',	1),
(363,	'ABCDEF',	'Mercedez',	2020,	300,	4,	4,	5,	'2022-03-10 05:27:35',	'2022-03-11 11:00:00',	'2022-03-11 12:00:00',	3,	2,	'LOCAL',	1),
(364,	'abcde',	'BMW',	2019,	200,	4,	3,	5,	'2022-03-10 06:28:52',	'2022-03-11 13:00:00',	'2022-03-11 14:00:00',	1,	4,	'LOCAL',	1),
(365,	'123456',	'bmw',	2002,	300,	2,	4,	5,	'2022-03-10 06:57:44',	'2022-03-11 14:00:00',	'2022-03-11 15:00:00',	3,	5,	'LOCAL',	1),
(366,	'123456',	'bmw',	2002,	300,	2,	4,	5,	'2022-03-10 07:00:03',	'2022-03-12 11:00:00',	'2022-03-12 12:00:00',	1,	2,	'LOCAL',	1),
(367,	'123456',	'BMW',	2002,	300,	2,	4,	5,	'2022-03-10 07:08:33',	'2022-03-18 13:00:00',	'2022-03-18 14:00:00',	1,	4,	'LOCAL',	1),
(368,	'123456',	'BMW',	2002,	300,	2,	4,	5,	'2022-03-10 07:09:06',	'2022-03-18 13:00:00',	'2022-03-18 14:00:00',	2,	4,	'LOCAL',	1),
(369,	'123456',	'BMW',	2002,	300,	2,	4,	7,	'2022-03-10 07:09:53',	'2022-03-19 13:00:00',	'2022-03-19 14:00:00',	3,	4,	'LOCAL',	1),
(370,	'abcde',	'BMW',	2002,	300,	2,	4,	5,	'2022-03-10 13:50:53',	'2022-03-18 14:00:00',	'2022-03-18 15:00:00',	3,	5,	'LOCAL',	1),
(371,	'abcde',	'BMW',	2002,	300,	2,	4,	5,	'2022-03-10 13:52:36',	'2022-03-18 11:00:00',	'2022-03-18 12:00:00',	1,	2,	'LOCAL',	1),
(372,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:24:47',	'2022-03-11 11:00:00',	'2022-03-11 12:00:00',	1,	2,	'LOCAL',	1),
(373,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:31:04',	'2022-03-11 11:00:00',	'2022-03-11 12:00:00',	4,	2,	'LOCAL',	1),
(374,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:32:57',	'2022-03-11 10:00:00',	'2022-03-11 11:00:00',	4,	1,	'LOCAL',	1),
(375,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:33:47',	'2022-03-11 11:00:00',	'2022-03-11 12:00:00',	2,	2,	'LOCAL',	1),
(376,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:35:08',	'2022-03-11 10:00:00',	'2022-03-11 11:00:00',	1,	1,	'LOCAL',	1),
(377,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:48:51',	'2022-03-11 10:00:00',	'2022-03-11 11:00:00',	3,	1,	'LOCAL',	1),
(378,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:51:26',	'2022-03-11 12:00:00',	'2022-03-11 13:00:00',	3,	3,	'LOCAL',	1),
(379,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:52:17',	'2022-03-11 12:00:00',	'2022-03-11 13:00:00',	1,	3,	'LOCAL',	1),
(380,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	5,	'2022-03-10 14:54:16',	'2022-03-11 13:00:00',	'2022-03-11 14:00:00',	2,	4,	'LOCAL',	1),
(381,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	7,	'2022-03-10 14:56:29',	'2022-03-11 13:00:00',	'2022-03-11 14:00:00',	3,	4,	'LOCAL',	1),
(382,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	7,	'2022-03-10 14:58:07',	'2022-03-11 14:00:00',	'2022-03-11 15:00:00',	1,	5,	'LOCAL',	1),
(383,	'fdrrt',	'rdrtgc',	2000,	300,	2,	4,	7,	'2022-03-10 14:59:22',	'2022-03-11 14:00:00',	'2022-03-11 15:00:00',	2,	5,	'LOCAL',	1),
(384,	'gyufty',	'yfutfu',	2002,	300,	2,	4,	7,	'2022-03-10 15:04:00',	'2022-03-31 13:00:00',	'2022-03-31 14:00:00',	2,	4,	'LOCAL',	1),
(385,	'gyufty',	'yfutfu',	2002,	300,	2,	4,	7,	'2022-03-10 16:06:36',	'2022-03-31 10:00:00',	'2022-03-31 11:00:00',	4,	1,	'LOCAL',	2),
(386,	'gyufty',	'yfutfu',	2002,	300,	2,	4,	5,	'2022-03-10 16:13:30',	'2022-03-31 11:00:00',	'2022-03-31 12:00:00',	3,	2,	'LOCAL',	1),
(387,	'HOLAMUN',	'Mazda',	2020,	300,	2,	4,	5,	'2022-03-25 04:50:24',	'2022-03-31 10:00:00',	'2022-03-31 11:00:00',	2,	1,	'LOCAL',	1),
(388,	'HOLAMUN',	'Mazda',	2020,	300,	2,	4,	5,	'2022-03-25 04:51:37',	'2022-03-31 11:00:00',	'2022-03-31 12:00:00',	2,	2,	'LOCAL',	1),
(389,	'XD456',	'Mazda',	2020,	300,	2,	4,	5,	'2022-03-25 04:53:23',	'2022-03-31 11:00:00',	'2022-03-31 12:00:00',	4,	2,	'LOCAL',	1),
(390,	'HSBC54',	'Fiesta',	2002,	300,	4,	4,	5,	'2022-03-25 04:59:15',	'2022-03-20 13:00:00',	'2022-03-20 14:00:00',	1,	4,	'LOCAL',	1),
(391,	'HSBC54',	'Ford',	2002,	300,	4,	4,	5,	'2022-03-25 05:02:34',	'2022-03-20 12:00:00',	'2022-03-20 13:00:00',	1,	3,	'LOCAL',	1),
(392,	'Hola',	'Hola',	2002,	300,	4,	4,	5,	'2022-03-29 16:40:49',	'2022-04-13 10:00:00',	'2022-04-13 11:00:00',	1,	1,	'LOCAL',	1),
(393,	'hola',	'hola',	2009,	300,	4,	4,	5,	'2022-03-30 17:57:56',	'2022-04-08 10:00:00',	'2022-04-08 11:00:00',	1,	1,	'LOCAL',	2),
(394,	'12234',	'HOLA',	2007,	300,	2,	4,	3,	'2022-04-04 22:46:00',	'2022-04-16 10:00:00',	'2022-04-16 11:00:00',	3,	1,	'LOCAL',	1);

CREATE TABLE `socio` (
  `idsocio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(500) CHARACTER SET latin1 NOT NULL,
  `idtiposocio` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idsocio`),
  KEY `idtiposocio` (`idtiposocio`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `socio_ibfk_1` FOREIGN KEY (`idtiposocio`) REFERENCES `tiposocio` (`idtiposocio`),
  CONSTRAINT `socio_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

INSERT INTO `socio` (`idsocio`, `nombre`, `foto`, `idtiposocio`, `idusuario`) VALUES
(1,	'Eric',	'fotos/foto-1634051620.png',	2,	2),
(3,	'Kelly',	'fotos/foto-1634051458.jpg',	1,	2),
(4,	'Rias',	'fotos/foto-1634235156.jpg',	3,	2),
(5,	'Russell Tun',	'fotos/foto-1634347428.jpg',	3,	5),
(6,	'Robert Tun',	'',	1,	15),
(7,	'Ayme Tun',	'',	1,	16),
(8,	'Lourdes Ek',	'',	1,	17),
(9,	'Agustin Tun',	'',	1,	18);

CREATE TABLE `sucursal` (
  `idsucursal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idsucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

INSERT INTO `sucursal` (`idsucursal`, `nombre`) VALUES
(1,	'Norte'),
(2,	'Sur'),
(3,	'Este'),
(4,	'Oeste');

CREATE TABLE `tiposocio` (
  `idtiposocio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idtiposocio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

INSERT INTO `tiposocio` (`idtiposocio`, `nombre`) VALUES
(1,	'Normal'),
(2,	'Premier'),
(3,	'VIP');

CREATE TABLE `tipo_servicio` (
  `idtiposervicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_servicio` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`idtiposervicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tipo_servicio` (`idtiposervicio`, `nombre_servicio`, `precio`) VALUES
(1,	'Normal',	100),
(2,	'VIP',	170),
(3,	'Medio',	200),
(4,	'Premium',	300);

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idrol` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `idrol` (`idrol`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`idusuario`, `email`, `password`, `idrol`) VALUES
(2,	'pedro@gmail.com',	'123456',	1),
(5,	'russelltun.ek@gmail.com',	'$2y$10$bVhPmtywFKrJe.KvMUSlqOeLz5LIS3zLt0UhI9cA/TT1lTnNuJvqO',	4),
(7,	'russell@hotmail.com',	'$2y$10$Mttk0Jsl/FaDYWf.mDvVX.jcd3wJrPCYNVwLNKaA14fxvxUJ8b1ve',	1),
(8,	'juan@hotmail.com',	'$2y$10$TeW4..IoVT8LGLdtLWylAeoyCheDcrP52QZS9a/MrxcO4a4pMw8pC',	4),
(9,	'Jack@gmail.com',	'$2y$10$12FJWectG.ZGhE4zdYoQAeyvMQK4zvahvV6DlEj7FboWM.mVLAVkq',	2),
(10,	'mario@gmail.com',	'$2y$10$gRdLACnewycv/xmBVeZY2OTXdIx1BGJwX1wBP9H2CFBnv5nW8o4Ku',	3),
(11,	'prueba1@gmail.com',	'$2y$10$nHdWE.mKN3wmBK2zHYj7S.J6fT.2zkUU4WQyYJKBshi4vEQ3U8tri',	2),
(12,	'prueba2@gmail.com',	'$2y$10$mXZX9NGlSp/xU.aJngE1C.jkg0Qsa71CiqebbQ.j.cPbij2TfWsJC',	4),
(13,	'prueba3@gmail.com',	'$2y$10$F1aYEDF6.JR9QFtD.Db/je55z/QK8pN7nWZ1XaorILwOE1GocfeLC',	4),
(14,	'robert@gmail.com',	'$2y$10$.LTYO1LMT0XbHkIieMMareCq4BpvMjS5BFE4NJWXxs9LffAjmLIoq',	4),
(15,	'robert@gmail.com',	'$2y$10$zHCDvLMn93S9AXw6zTrBpugZLWSFZ8R0cVgJL55RUvA4nSo0uByfi',	4),
(16,	'ayme@gmail.com',	'$2y$10$Fn1E3X.B18Ppi5YeJ7A1s.QKKT8P0HptqnmzjN0sUNMx1.qaB7gye',	4),
(17,	'lourdes@gmail.com',	'$2y$10$BE8363EAQ.B6tdHqda65muAHnjsVhwBNdaR2l2kIqTHbq75Et1gKK',	4),
(18,	'agustin@gmail.com',	'$2y$10$VUHfkfvcNdT087MsXJrIFO/Rj.MODZ8sFmfaR5lHAkqjm0KfN3oZe',	4);

-- 2022-04-14 18:19:41
