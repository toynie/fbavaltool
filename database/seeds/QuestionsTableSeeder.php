<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ----> Questions of S.1  <-----
        ///------------------------------


        /*  1 = select (button group)
            2 = list  //blank
            3 = yes no// button group yes or no only
            4 = radio
            5 = val int (input integer)
            6 = check list
            7 = multiple val array (multiple input answer)
            8 = Integer Range Question
            9 = Conditional value with customize valuation effect
            10 = hidden question
            11 = Integer Range Question Percentage
         */





        // ----> Questions of S.2  <-----

        App\Question::create([
            'name'=>'Which best describes customer breakdown',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>0,
            'type'=>2,
            'typeStyle'=>1,
            'q_info'=>'B2B stands for business-to-business which is a process for selling products or services to other businesses. B2C stands for business-to-consumer which is a process for selling products directly to consumers.',
            'unSureSkip'=>0,
        ]);

        App\Question::create([
            'name'=>'Which market niche best describes the products you sell?',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>10,
            'm_n_mult'=>-.5,
            'type'=>2,
            'typeStyle'=>1,
            'q_info'=>'',
            'unSureSkip'=>0,
            'free_index'=>1,
        ]);
        App\Question::create([
            'name'=>'When was this business founded?',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>0,
            'type'=>2,
            'typeStyle'=>1,
            'q_info'=>'When did the business first start operating?',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'When did your business first starting generating profit?',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>.10,
            'm_n_mult'=>-0.05,
            'type'=>2,
            'typeStyle'=>1,
            'q_info'=>'When (if ever) did the business first generating more revenue than expenses in the same time period?',
            'unSureSkip'=>0,
            'free_index'=>2,
        ]);
        App\Question::create([
            'name'=>'Revenue',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>.2,
            'm_n_mult'=>-0,
            'type'=>5,
            'typeStyle'=>1,
            'q_info'=>'Revenue is the total amount of income generated by the sale of goods or services related to the company\'s primary operations',
            'unSureSkip'=>0,
            'free_index'=>4,
        ]);
        App\Question::create([
            'name'=>'Cost of Goods Sold (CoGS)',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>0,
            'm_n_mult'=>-0,
            'type'=>5,
            'typeStyle'=>1,
            'q_info'=>'Cost of goods sold (COGS) refers to the direct production cost of the goods sold by a company. E.g. manufacturing costs, licensing fees, etc. If the business incurs no COGS, just enter "0". ',
            'unSureSkip'=>0,
            'free_index'=>5,
        ]);
        App\Question::create([
            'name'=>'Gross Margin',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>.05,
            'm_n_mult'=>-.05,
            'type'=>11,
            'typeStyle'=>1,
            'q_info'=>'Cost of goods sold (COGS) refers to the direct production cost of the goods sold by a company. E.g. manufacturing costs, licensing fees, etc. If the business incurs no COGS, just enter "0". ',
            'unSureSkip'=>0,
            'free_index'=>6,
        ]);
        App\Question::create([
            'name'=>'Operating Costs',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>0,
            'm_n_mult'=>0,
            'type'=>5,
            'typeStyle'=>1,
            'q_info'=>'Cost of goods sold (COGS) refers to the direct production cost of the goods sold by a company. E.g. manufacturing costs, licensing fees, etc. If the business incurs no COGS, just enter "0". ',
            'unSureSkip'=>0,
            'free_index'=>7,
        ]);
        App\Question::create([
            'name'=>'Owners Drawings',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>0,
            'm_n_mult'=>0,
            'type'=>5,
            'typeStyle'=>1,
            'q_info'=>'Calculate the total amount the business has paid you and other owners of the business. NOTE: if the business has multiple owners who have been paid owner salary, drawings or dividends, the SDE Multipler calculation may need to be adjusted depending on the number of owners and their involvement in the business.',
            'unSureSkip'=>0,
            'free_index'=>8,
        ]);
        App\Question::create([
            'name'=>'Net Margin',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.2,
            'm_n_mult'=>-.2,
            'type'=>8,
            'typeStyle'=>1,
            'q_info'=>'',
            'unSureSkip'=>0,
            'free_index'=>10,

        ]);

        App\Question::create([
            'name'=>'Unrelated or Unnecessary Business Expenses',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>0,
            'm_n_mult'=>0,
            'type'=>5,
            'typeStyle'=>1,
            'q_info'=>'Unfortunately there is no black and white definition that determines which expenses CAN and CANNOT be considered unrelated or unecessary. However, use your common sense and follow these three rules: Do not include expenses that were not calcuated in the total operating cost you entered above. Do not include any owner salary, drawings or dividend expenses. Do not include any expenses that a buyer is likely to challenge and argue are necessary costs of running the business. An example of an acceptable \'add-back\' expense is an Audible.com subscription. ',
            'popUnderComment'=>'Note: Do not include expenses that were not calcuated in the total operating cost you entered above. Do not include any owner salary, drawings or dividend expenses. Do not include any expenses that a buyer is likely to challenge and argue are necessary costs of running the business. If you are unsure of which expenses qualify as an add-back, read section 1.4.2 of our eBook \'what is reasonable to add back and what is not?\'. ',
            'unSureSkip'=>0,
            'free_index'=>9,

        ]);
        App\Question::create([
            'name'=>'Facebook',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum total of Facebook followers for the primary Facebook account that would be included in the sale of your business.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        // App\Question::create([
        //     'name'=>'Twitter',
        //     'qset_id'=>2,
        //     'isFree'=>0,
        //     'm_p_mult'=>.05,
        //     'm_n_mult'=>0,
        //     'type'=>1,
        //     'typeStyle'=>1,
        //     'q_info'=>'Sum total of Twitter followers for the primary Twitter account that would be included in the sale of your business. ',
        //     'popUnderComment'=>'',
        //     'unSureSkip'=>0,
        // ]);
        App\Question::create([
            'name'=>'Twitter',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum total of Twitter followers for the primary Twitter account that would be included in the sale of your business. ',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Instagram',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum total of Instagram followers for the primary Instagram account that would be included in the sale of your business.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Youtube',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum total of Youtube followers for the primary Youtube account that would be included in the sale of your business.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'TikTok',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum total of TikTok followers for the primary Tik Tok account that would be included in the sale of your business.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Pinterest',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum total of Pinterest followers for the primary Pinterest account that would be included in the sale of your business.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Linkedin',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum total of Pinterest followers for the primary Pinterest account that would be included in the sale of your business.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Other',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum total of LinkedIn followers for the primary LinkedIn account that would be included in the sale of your business.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'How many active email subscribers do you have?',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.10,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'\'Active\' email subscribers refers to email suscribers who have opened at least one email in the past 12 months. ',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'In the past 6 months, have there been any changes to the product offering, pricing, operations, sales or marketing activites?',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-.30,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'In the past 6 months, have there been any changes to the product offering, pricing, operations, sales or marketing activites?  ',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'How many people own the business?',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'In the past 6 months, have there been any changes to the product offering, pricing, operations, sales or marketing activites?  ',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'On average, how many accumulative owner hours are spent operating the business each week?',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>.2,
            'm_n_mult'=>-.30,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'On average, how many accumulative owner hours are spent operating the business each week?',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
            'free_index'=>14,
        ]);
        App\Question::create([
            'name'=>'How many different products do you currently sell?',
            'qset_id'=>2,
            'isFree'=>0,
            'm_p_mult'=>.01,
            'm_n_mult'=>-.01,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'How many different products do you currently sell? ',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Where are the majority of your customers located?',
            'qset_id'=>2,
            'isFree'=>1,
            'm_p_mult'=>0,
            'm_n_mult'=>0,
            'type'=>7,
            'typeStyle'=>1,
            'q_info'=>'An estimation will do just fine!',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
            'free_index'=>13,
        ]);


        // ----> Questions of S.3  <-----
        App\Question::create([
            'name'=>'What is your average refund / chargeback rate?',
            'qset_id'=>3,
            'isFree'=>0,
            'm_p_mult'=>.01,
            'm_n_mult'=>-.40,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Divide the total number of refunds by the total number of product sales over the same trailing twelve month period',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);

        App\Question::create([
            'name'=>'What % of sales come from repeat customers?',
            'qset_id'=>3,
            'isFree'=>0,
            'm_p_mult'=>.10,
            'm_n_mult'=>-.01,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Divide Repeat Customers by your Total Paying Customers.',
            'popUnderComment'=>'',
            'unSureSkip'=>1,
        ]);

        App\Question::create([
            'name'=>'How seasonal is your business? ',
            'qset_id'=>3,
            'isFree'=>0,
            'm_p_mult'=>.01,
            'm_n_mult'=>-.3,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Divide Repeat Customers by your Total Paying Customers.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Compared to the previous year, which best describes  your website traffic trend? ',
            'qset_id'=>3,
            'isFree'=>0,
            'm_p_mult'=>.10,
            'm_n_mult'=>-.20,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Log in to analytics.google.com > audience > overview. Change date range to represent the trailing 12 months and analyze the traffic trend.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Compared to the previous year, have your sales ... ',
            'qset_id'=>3,
            'isFree'=>1,
            'm_p_mult'=>.30,
            'm_n_mult'=>-.40,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'[Insert Calculation] If your business is less than 2 years old use the same calculation to compare the trailing 6 month period o',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
            'free_index'=>11,
        ]);
        App\Question::create([
            'name'=>'Compared to the previous year, has your profit ...',
            'qset_id'=>3,
            'isFree'=>1,
            'm_p_mult'=>.40,
            'm_n_mult'=>-.50,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'[Insert Calculation] If your business is less than 2 years old use the same calculation to compare the trailing 6 month period o',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
            'free_index'=>12,
        ]);
        App\Question::create([
            'name'=>'What is your Average Order Value (AOV)?',
            'qset_id'=>3,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>0,
            'q_dat_1'=>500,
            'q_dat_2'=>.03,
            'q_dat_3'=>0,
            'type'=>9,
            'typeStyle'=>1,
            'q_info'=>'What is your Average Order Value (AOV)?',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);


        // ----> Questions of S.4  <-----
        App\Question::create([
            'name'=>'How often does the business engage in sales events?',
            'qset_id'=>7,
            'isFree'=>0,
            'm_p_mult'=>.01,
            'm_n_mult'=>-.15,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'i.e. discounts, offers, flash sales, holiday sales, etc.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'What percentage of revenue does your five largest customers represent?',
            'qset_id'=>7,
            'isFree'=>0,
            'm_p_mult'=>.01,
            'm_n_mult'=>-.10,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum the total annual revenue generated from your 5 largest customers and divide it by the total annual revenue the business has generated.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'What percentage of total revenue does  your largest customer represent?',
            'qset_id'=>7,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-.05,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Sum the total annual revenue generated from your largest customer and divide it by the total annual revenue the business has generated.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'What would happen if your most valuable 3rd party partnerships was terminated over night?',
            'qset_id'=>7,
            'isFree'=>0,
            'm_p_mult'=>.03,
            'm_n_mult'=>-.40,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'i.e. how dependent is your business on 3 party partners?',
            'popUnderComment'=>'',
            'unSureSkip'=>1,
        ]);
        App\Question::create([
            'name'=>'What is the approximate breakdown of the site\'s traffic sources?',
            'qset_id'=>7,
            'isFree'=>1,
            'm_p_mult'=>.03,
            'm_n_mult'=>-.03,
            'type'=>7,
            'typeStyle'=>1,
            'q_info'=>'Google Analytics > Acquisition > All Traffic > Source Medium',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
            'free_index'=>13,
        ]);
        App\Question::create([
            'name'=>'Is the overall market demand for your products or service growing or slowing?',
            'qset_id'=>7,
            'isFree'=>0,
            'm_p_mult'=>.03,
            'm_n_mult'=>-.20,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'If you are unsure, skip this question.',
            'popUnderComment'=>'',
            'unSureSkip'=>1,
        ]);
        App\Question::create([
            'name'=>'Has the business ever been banned from a payment gateway?',
            'qset_id'=>7,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-.20,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'A payment gateway is the customer-facing interface used to collect payments (e.g. PayPal, Stripe, BrainTreeSecurePay, 2checkOut, etc.)',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);

        // ----> Questions of S.5  <-----
        App\Question::create([
            'name'=>'Our customers... ',
            'qset_id'=>8,
            'isFree'=>0,
            'm_p_mult'=>0.05,
            'm_n_mult'=>-0.03,
            'type'=>7,
            'typeStyle'=>1,
            'q_info'=>'If unsure, skip this question',
            'popUnderComment'=>'',
            'unSureSkip'=>1,
        ]);
        App\Question::create([
            'name'=>'Does the business have any patents? ',
            'qset_id'=>8,
            'isFree'=>0,
            'm_p_mult'=>0.1,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'A patent refers to a government authority or licence conferring a right or title for a set period, especially the sole right to exclude others from making, using, or selling an invention.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Does the business have any trademarks? ',
            'qset_id'=>8,
            'isFree'=>0,
            'm_p_mult'=>0.05,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'A trademark refers to a symbol, word, or words legally registered or established by use as representing a company or product.',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'How easily can a customer switch to a competitor? ',
            'qset_id'=>8,
            'isFree'=>0,
            'm_p_mult'=>0.2,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Switching costs are one-time costs the customer faces when switching your product or service out for a competitor\'s.  Costs may include; cancellation fees, retraining employees, updating technology stack, technical support, etc.',
            'popUnderComment'=>'',
            'unSureSkip'=>1,
        ]);
        App\Question::create([
            'name'=>'Does your business benefit from government intervention or regulation that restricts or limits new competitors entering the market?',
            'qset_id'=>8,
            'isFree'=>0,
            'm_p_mult'=>0.20,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Does the business have any partnerships that grant exclusive access to a customer base?',
            'qset_id'=>8,
            'isFree'=>0,
            'm_p_mult'=>0.10,
            'm_n_mult'=>0,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'E.g. Dealflow benefited from an exclusive partnership with Flippa, who promoted Dealflow as their preferred broker partner. ',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Which best describes your product offering?',
            'qset_id'=>8,
            'isFree'=>0,
            'm_p_mult'=>0.10,
            'm_n_mult'=>-.30,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'E.g. Dealflow benefited from an exclusive partnership with Flippa, who promoted Dealflow as their preferred broker partner. ',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);

        // ----> Questions of S.6  <-----

        App\Question::create([
            'name'=>'What would happen to your profit margin if sales increased significantly?',
            'qset_id'=>4,
            'isFree'=>0,
            'm_p_mult'=>0.1,
            'm_n_mult'=>-.15,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Would the revenue / expense ratio get worse, stay the same, or improve if sales doubled or tripled? i.e would hosting costs change, would you need to hire more staff, etc. ',
            'popUnderComment'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'What level of customization do you offer customers?',
            'qset_id'=>4,
            'isFree'=>0,
            'm_p_mult'=>0.1,
            'm_n_mult'=>-.1,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Which best describes the relationship between owner(s) and customers? ',
            'qset_id'=>4,
            'isFree'=>0,
            'm_p_mult'=>0.03,
            'm_n_mult'=>-.30,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Consider the relationships you and any co-owners have with your customers. Strangers? Met at an event once? Distant cousins? Best friends?',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'Which best describes your management team?',
            'qset_id'=>4,
            'isFree'=>0,
            'm_p_mult'=>0.15,
            'm_n_mult'=>-0.0125,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Are the owners responsible for managing the business\' team and operations or is there a manager or leadership team? ',
            'unSureSkip'=>0,
        ]);
        App\Question::create([
            'name'=>'What is your average Customer Acquisition Cost (CAC)?',
            'qset_id'=>4,
            'isFree'=>0,
            'm_p_mult'=>0.1,
            'm_n_mult'=>-0.01,
            'type'=>8,
            'typeStyle'=>1,
            'q_info'=>'',
            'unSureSkip'=>1,
        ]);
        App\Question::create([
            'name'=>'What is your average Customer Lifetime Value (CLV)?',
            'qset_id'=>4,
            'isFree'=>0,
            'm_p_mult'=>0.01,
            'm_n_mult'=>-0.01,
            'type'=>5,
            'typeStyle'=>1,
            'q_info'=>'',
            'unSureSkip'=>1,
        ]);
        App\Question::create([
            'name'=>'CLV:CAC Ratio',
            'qset_id'=>4,
            'isFree'=>0,
            'm_p_mult'=>0.05,
            'm_n_mult'=>-0.3,
            'type'=>5,
            'typeStyle'=>1,
            'q_info'=>'CLV:CAC Ratio = Customer Lifetime Value (CLV) divided by Customer Acquisition Cost (CAC) ',
            'unSureSkip'=>1,
        ]);


         // ----> Questions of S.7  <-----
         App\Question::create([
            'name'=>'Are there any business related assets that you would NOT include as part of the sale? ',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.10,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Technically, a business asset can be anything listed on the balance sheet. However for the purpose of this tool, a business asset refers to things that the business uses as part of its operations. E.g. 3rd party subscriptions , social media accounts, email lists, domains, etc. ',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'Can all 3rd party accounts be transferred to a new owner?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.40,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'e.g. payment gateways, merchant accounts, social media accounts, etc.',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'Is there any percentage of business revenue that cannot be continued under new ownership?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.5,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Are there any revenue streams that would discontinue if someone took over your business? If so, what percentage of total revenue do you estimate that to be?',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'Does the business have an operations manual? ',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>.03,
            'm_n_mult'=>-0.03,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'An operations manual (aka Standard Operating Procedure) is a set of documents detailing the business\' operating systems, processes and procedures.',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'What degree of specialized knowledge and skills are required from the owner(s) to run the business?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>.03,
            'm_n_mult'=>-.10,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Consider your specialized knowledge as well as any co-owners. Specialized knowledge refers to the competencies and skills acquired in a particular discipline',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'Which business functions are ownership directly responsible for?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.03,
            'type'=>6,
            'typeStyle'=>1,
            'q_info'=>'Consider the responsibilities of you and any co-owners',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'Is the business restricted from operating in a particular country or region?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>.03,
            'm_n_mult'=>-0.03,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Is the business restricted from operating in a particular country or region?',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'Has the business been involved in any legal disputes?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.40,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'i.e. any official notice of a conflict of claims or rights where by an assertion of a right, claim or demand on one side is met by contrary claims or allegations on the other side.',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'If you sold your busiuness, who would continue working for the business under new ownership?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>-0.20,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'If you don\'t employ any staff and do not intend to keep working for the business after you have sold it, select \'no one\'.  ',
            'unSureSkip'=>1,
        ]);

         App\Question::create([
            'name'=>'Would any 3rd party relationships change or discontinue under new ownership?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>.05,
            'm_n_mult'=>-.05,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'E.g. partners, grandfathered discount price on software subscription will not be honored under new ownership',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'Do you have written agreements with key business stakeholders?',
            'qset_id'=>5,
            'isFree'=>0,
            'm_p_mult'=>.02,
            'm_n_mult'=>-.02,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'',
            'unSureSkip'=>1,
        ]);


         // ----> Questions of S.8  <-----
         App\Question::create([
            'name'=>'Does the business use an accounting software?',
            'qset_id'=>6,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.03,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'E.g. Xero, Quickbooks, Reckon, etc.',
            'unSureSkip'=>0,
        ]);

         App\Question::create([
            'name'=>'Can you provide an accurate breakdown of monthly financial statements?',
            'qset_id'=>6,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.5,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'i.e. Profit & Loss Statements & Cashflow Statements',
            'unSureSkip'=>0,
        ]);
         App\Question::create([
            'name'=>'Are all business transactions kept separate from other business and personal bank accounts? ',
            'qset_id'=>6,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.05,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Are all business transactions kept separate from other business and personal bank accounts? ',
            'unSureSkip'=>0,
        ]);
         App\Question::create([
            'name'=>'Can you provide monthly bank statements to verify your financial claims?',
            'qset_id'=>6,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.05,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'',
            'unSureSkip'=>0,
        ]);
         App\Question::create([
            'name'=>'Can you provide clean tax returns for each year the business has been operating?',
            'qset_id'=>6,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.15,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'This does not include tax returns for the current year of operations ',
            'unSureSkip'=>0,
        ]);
         App\Question::create([
            'name'=>'Do you have Google Analytics installed on your website? ',
            'qset_id'=>6,
            'isFree'=>1,
            'm_p_mult'=>0,
            'm_n_mult'=>-0.50,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'Unsure? Read this article: https://www.clicky.co.uk/blog/check-your-website-has-google-analytics-installed/',
            'unSureSkip'=>0,
            'free_index'=>3,
        ]);

         App\Question::create([
            'name'=>'Do you have monthly payment gateway reports available? ',
            'qset_id'=>6,
            'isFree'=>0,
            'm_p_mult'=>0,
            'm_n_mult'=>-.05,
            'type'=>1,
            'typeStyle'=>1,
            'q_info'=>'',
            'unSureSkip'=>0,
        ]);


    }
}