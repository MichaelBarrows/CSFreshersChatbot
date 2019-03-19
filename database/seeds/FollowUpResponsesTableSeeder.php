<?php

use Illuminate\Database\Seeder;

class FollowUpResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follow_up_responses')->insert([
            ['id' => 1, 'follow_up_option_id' => 1, "response" => "There are 3 events on Monday:"],
            ['id' => 2, 'follow_up_option_id' => 1, "response" => "12-1PM: Computer Science Department Welcome Talk [Tech Hub Lecture Theatre]"],
            ['id' => 3, 'follow_up_option_id' => 1, "response" => "1-2PM: Learning Services and Library Talk and introduction of Student Mentors [Tech Hub Lecture Theatre]"],
            ['id' => 4, 'follow_up_option_id' => 1, "response" => "Campus and Library tour [Tech Hub Foyer]"],
            ['id' => 5, 'follow_up_option_id' => 2, "response" => "There are 7 events on Tuesday:"],
            ['id' => 6, 'follow_up_option_id' => 2, "response" => "9-11AM: Induction 1 - Processes & Regulations [Tech Hub Lecture Theatre]"],
            ['id' => 7, 'follow_up_option_id' => 2, "response" => "11-12PM: Careers & Job Club [Tech Hub Lecture Theatre]"],
            ['id' => 8, 'follow_up_option_id' => 2, "response" => "12-1PM: Department Social Event - pizza available [Tech Hub Foyer]"],
            ['id' => 9, 'follow_up_option_id' => 2, "response" => "1-2PM: IT Inductions [THF03/THF04/THF07/THF01]"],
            ['id' => 10, 'follow_up_option_id' => 2, "response" => "2-3PM: Meet Your Personal Tutors [Tech Hub Labs – tbc during IT Inductions]"],
            ['id' => 11, 'follow_up_option_id' => 2, "response" => "3-3:45PM: Introduction to the Students’ Union and SU Consent Workshop [Tech Hub Lecture Theatre]"],
            ['id' => 12, 'follow_up_option_id' => 2, "response" => "3:45-4:15PM: Student Services [Tech Hub Lecture Theatre]"],
            ['id' => 13, 'follow_up_option_id' => 3, "response" => "There are 2 events on Wednesday"],
            ['id' => 14, 'follow_up_option_id' => 3, "response" => "9:30-10:45AM: Unismart Session [H1]"],
            ['id' => 15, 'follow_up_option_id' => 3, "response" => "10-2PM: Students' Union Welcome Fair [The Hub]"],
            ['id' => 16, 'follow_up_option_id' => 4, "response" => "There are 5 events on on Thursday"],
            ['id' => 17, 'follow_up_option_id' => 4, "response" => "9-11AM: Induction 2 – Get the most from your studies [Tech Hub Lecture Theatre]"],
            ['id' => 18, 'follow_up_option_id' => 4, "response" => "11-12PM: French, Mandarin and Spanish Language Session [Tech Hub Lecture Theatre]"],
            ['id' => 19, 'follow_up_option_id' => 4, "response" => "12-1PM: Drop-In for Personal Tutors [Tech Hub Offices]"],
            ['id' => 20, 'follow_up_option_id' => 4, "response" => "1-5PM: Team Building/Employability Sessions/CAVE/Connect Space Demos [Tech Hub Foyer]"],
            ['id' => 21, 'follow_up_option_id' => 4, "response" => "5-8PM: Movie & Refreshments [Tech Hub Lecture Theatre]"],
            ['id' => 22, 'follow_up_option_id' => 5, "response" => "No Departmental induction sessions scheduled – attendance not required"],
            ['id' => 24, 'follow_up_option_id' => 6, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/MComp-Business-Information-Systems.pdf"],
            ['id' => 25, 'follow_up_option_id' => 7, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/BSc-Hons-Information-Technology-Management-for-Business.docx.pdf"],
            ['id' => 26, 'follow_up_option_id' => 8, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/BSc-Hons-Computer-Science.docx.pdf"],
            ['id' => 27, 'follow_up_option_id' => 9, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/BSc-Hons-Computer-Science-and-Mathematics.pdf"],
            ['id' => 28, 'follow_up_option_id' => 10, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/BSc-Hons-Data-Science.pdf"],
            ['id' => 29, 'follow_up_option_id' => 11, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/MComp-Computer-Security-and-Networks.docx.pdf"],
            ['id' => 30, 'follow_up_option_id' => 12, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/BSc-Hons-Computing.pdf"],
            ['id' => 31, 'follow_up_option_id' => 13, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/BSc-Hons-Computing-Games-Programming.docx.pdf"],
            ['id' => 32, 'follow_up_option_id' => 14, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/BSc-Hons-Computing-Networking-Security-and-Forensics.docx.pdf"],
            ['id' => 33, 'follow_up_option_id' => 15, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/MComp-Software-Application-Development.docx.pdf"],
            ['id' => 34, 'follow_up_option_id' => 16, "response" => "link https://www.edgehill.ac.uk/gettingstarted/files/2018/08/BSc-Hons-Web-Design-and-Development.docx.pdf"],

            ['id' => 35, 'follow_up_option_id' => 17, "response" => "The course leader for Business Information Systems is David Walsh"],
            ['id' => 36, 'follow_up_option_id' => 18, "response" => "The course leader for Information Technology Management for Business (ITMB) is David Walsh"],
            ['id' => 37, 'follow_up_option_id' => 19, "response" => "The course leader for Computer Science is Dr Ardhendu Behera"],
            ['id' => 38, 'follow_up_option_id' => 20, "response" => "The course leader for Computer Science and Mathematics is Dr Ardhendu Behera"],
            ['id' => 39, 'follow_up_option_id' => 21, "response" => "The course leader for Data Science is Dr Ardhendu Behera"],
            ['id' => 40, 'follow_up_option_id' => 22, "response" => "The course leader for Computer Security and Networks is Susan Canning"],
            ['id' => 41, 'follow_up_option_id' => 23, "response" => "The course leader for Computing is Susan Canning"],
            ['id' => 42, 'follow_up_option_id' => 24, "response" => "The course leader for Computing (Games Programming) is Susan Canning"],
            ['id' => 43, 'follow_up_option_id' => 25, "response" => "The course leader for Computing (Network, Security and Forensics) is Susan Canning"],
            ['id' => 44, 'follow_up_option_id' => 26, "response" => "The course leader for Software Application Development is Dr Ardhendu Behera"],
            ['id' => 45, 'follow_up_option_id' => 27, "response" => "The course leader for Web Design and Development is David Walsh"],
            ['id' => 46, 'follow_up_option_id' => 28, "response" => "link https://www.edgehill.ac.uk/sustainability/files/2018/10/EdgeLinkTimetable.pdf"],
            ['id' => 47, 'follow_up_option_id' => 29, "response" => "link https://itunes.apple.com/gb/app/circuit-laundry/id804328931?mt=8"],
            ['id' => 48, 'follow_up_option_id' => 30, "response" => "link https://play.google.com/store/apps/details?id=greenwald.app.circuit"],
            ['id' => 49, 'follow_up_option_id' => 31, "response" => "link https://www.edgehill.ac.uk/itservices/wireless-network/"],
            ['id' => 50, 'follow_up_option_id' => 32, "response" => "link https://www.edgehill.ac.uk/services/council-tax-exemption-certificate/"],
            ['id' => 51, 'follow_up_option_id' => 33, "response" => "link https://www.edgehill.ac.uk/services/parking/"],
            ['id' => 52, 'follow_up_option_id' => 34, "response" => "link https://www.edgehillsu.org.uk/groups#club-societyt#all"],
            ['id' => 53, 'follow_up_option_id' => 35, "response" => "link https://www.facebook.com/pg/edgehillsubar/about/"],
            ['id' => 54, 'follow_up_option_id' => 36, "response" => "On Welcome Sunday, the following events are running:"],
            ['id' => 55, 'follow_up_option_id' => 36, "response" => "Textbook [9PM] SU Bar - Free with wristband or £5"],
            ['id' => 56, 'follow_up_option_id' => 37, "response" => "On Monday, the following events are running:"],
            ['id' => 57, 'follow_up_option_id' => 37, "response" => "Vintage Folk [9AM-4PM] Venue - Free"],
            ['id' => 58, 'follow_up_option_id' => 37, "response" => "Giant SU BBQ [12PM-4PM] Back of SU Bar - Free"],
            ['id' => 59, 'follow_up_option_id' => 37, "response" => "Inflatables [12PM-3PM]"],
            ['id' => 60, 'follow_up_option_id' => 37, "response" => "Board Games [6PM-9PM] SU1 - Free"],
            ['id' => 61, 'follow_up_option_id' => 37, "response" => "Milk [9PM-2AM] Venue - Free with wristband or £5"],
            ['id' => 62, 'follow_up_option_id' => 38, "response" => "On Tuesday, the following events are running:"],
            ['id' => 63, 'follow_up_option_id' => 38, "response" => "Scavenger Hunt Campus Challenge [12PM-2PM]"],
            ['id' => 64, 'follow_up_option_id' => 38, "response" => "Crafternoon: DIY Room Decorations [3PM-5PM] Venue - Free"],
            ['id' => 65, 'follow_up_option_id' => 38, "response" => "Free Film Tuesday [7PM-9PM] Arts Centre - Free"],
            ['id' => 66, 'follow_up_option_id' => 38, "response" => "Video Game Society Taster Session [6PM-9PM]"],
            ['id' => 67, 'follow_up_option_id' => 38, "response" => "Music Nerds Taster Session [6PM-9PM]"],
            ['id' => 68, 'follow_up_option_id' => 38, "response" => "Campus Sport Pool Party [7PM-9PM]"],
            ['id' => 69, 'follow_up_option_id' => 38, "response" => "Strangled Cats Karaoke [9PM-1AM] SU Bar - Free"],
            ['id' => 70, 'follow_up_option_id' => 38, "response" => "Level [9PM] Meet at SU Bar - £7"],
            ['id' => 71, 'follow_up_option_id' => 39, "response" => "On Wednesday, the following events are running:"],
            ['id' => 72, 'follow_up_option_id' => 39, "response" => "Welcome Fair [10:30AM-2:30PM] The Hub - Free"],
            ['id' => 73, 'follow_up_option_id' => 39, "response" => "Free Film Wednesday [7PM-9:30PM] Arts Centre - Free"],
            ['id' => 74, 'follow_up_option_id' => 39, "response" => "Foam Party [9PM-2AM] SU Bar/Venue - Free with wristband or £4"],
            ['id' => 75, 'follow_up_option_id' => 40, "response" => "On Thursday, the following events are running:"],
            ['id' => 76, 'follow_up_option_id' => 40, "response" => "Plant for your Room and Pot Decorating [3PM-5PM] The Hub - Free"],
            ['id' => 77, 'follow_up_option_id' => 40, "response" => "Roller Disco [6PM-9PM] Wilson Gym"],
            ['id' => 78, 'follow_up_option_id' => 40, "response" => "Anime Society Mixer [6PM-10PM] HUB 1 - Free"],
            ['id' => 79, 'follow_up_option_id' => 40, "response" => "Quiz 2.0 [6PM-Midnight] SU Bar"],
            ['id' => 80, 'follow_up_option_id' => 40, "response" => "Stealing Sheep [7PM] Arts Centre"],
            ['id' => 81, 'follow_up_option_id' => 41, "response" => "On Friday, the following events are running:"],
            ['id' => 82, 'follow_up_option_id' => 41, "response" => "The Big Student Resale [10AM-3PM] Venue"],
            ['id' => 83, 'follow_up_option_id' => 41, "response" => "Yoga [5PM-6PM] SU1"],
            ['id' => 84, 'follow_up_option_id' => 41, "response" => "Free Film Friday [7PM-9:30PM] Arts Centre - Free"],
            ['id' => 85, 'follow_up_option_id' => 41, "response" => "A Tribute to Chase & Status [9PM-3AM] SU Bar/Venue - Free before 9PM with wristband or £6 on the door"],
            ['id' => 86, 'follow_up_option_id' => 42, "response" => "On Saturday, the following events are running:"],
            ['id' => 87, 'follow_up_option_id' => 42, "response" => "Hangover Club [10AM-4PM] SU Bar - Free entry"],
            ['id' => 88, 'follow_up_option_id' => 42, "response" => "Harry Potter Society Games Afternoon [2PM-4PM] Downstairs in The Hub"],
            ['id' => 89, 'follow_up_option_id' => 42, "response" => "Saturday Sports [12PM] SU Bar"],
            ['id' => 90, 'follow_up_option_id' => 43, "response" => "On Sunday, the following events are running:"],
            ['id' => 91, 'follow_up_option_id' => 43, "response" => "Medieval Re-enactment Society Taster Session [11AM-4PM] Coronation Park"],
            ['id' => 92, 'follow_up_option_id' => 43, "response" => "Sunday Sports [1PM] SU Bar"],
            ['id' => 93, 'follow_up_option_id' => 43, "response" => "Textbook Presents The Stickmen [9PM-2AM] SU Bar/Venue - Free before 9:30PM with a wristband or £7 on the door"],
            ['id' => 94, 'follow_up_option_id' => 44, "response" => "link https://www.edgehill.ac.uk/food/where-to-eat/sages/"],
            ['id' => 95, 'follow_up_option_id' => 45, "response" => "link https://www.edgehill.ac.uk/food/where-to-eat/grab-n-go-hub/"],
            ['id' => 96, 'follow_up_option_id' => 46, "response" => "link https://www.edgehill.ac.uk/food/where-to-eat/cafe-rewind/"],
            ['id' => 97, 'follow_up_option_id' => 47, "response" => "link https://www.edgehill.ac.uk/food/where-to-eat/the-red-bar/"],
            ['id' => 98, 'follow_up_option_id' => 48, "response" => "link https://www.edgehill.ac.uk/food/where-to-eat/waters-edge/"],
            ['id' => 99, 'follow_up_option_id' => 49, "response" => "link https://www.edgehill.ac.uk/food/where-to-eat/subar/"],
            ['id' => 100, 'follow_up_option_id' => 50, "response" => "link https://www.edgehillsu.org.uk/articles/edge-hill-students-union-s-subway-opens-on-campus"],
            ['id' => 101, 'follow_up_option_id' => 51, "response" => "link https://www.edgehill.ac.uk/study/undergraduate/computing-it-and-web-development/?tab=facilities"],
            ['id' => 102, 'follow_up_option_id' => 52, "response" => "link https://go.edgehill.ac.uk/mail"],
            ['id' => 103, 'follow_up_option_id' => 53, "response" => "link https://www.edgehill.ac.uk/students/"],
            ['id' => 104, 'follow_up_option_id' => 54, "response" => "link https://go.edgehill.ac.uk/vle"],
            ['id' => 105, 'follow_up_option_id' => 55, "response" => "link http://ehu.ac.uk/myfm"],
            ['id' => 106, 'follow_up_option_id' => 56, "response" => "link https://www.edgehill.ac.uk/services/games-console-registration/"],
            ['id' => 107, 'follow_up_option_id' => 57, "response" => "link https://www.edgehill.ac.uk/ls/"],
            ['id' => 108, 'follow_up_option_id' => 58, "response" => "link https://www.edgehill.ac.uk/services/computer-availability/"],
            ['id' => 109, 'follow_up_option_id' => 59, "response" => "link http://ehu.ac.uk/askus"],
            ['id' => 110, 'follow_up_option_id' => 60, "response" => "link mailto:CatalystEnquiries@edgehill.ac.uk"],
            ['id' => 111, 'follow_up_option_id' => 61, "response" => "link https://www.edgehill.ac.uk/studentservices/moneyadvice/"],
            ['id' => 112, 'follow_up_option_id' => 62, "response" => "link http://ehu.ac.uk/msoffice"],
            ['id' => 113, 'follow_up_option_id' => 63, "response" => "link https://www.edgehill.ac.uk/services/password-reset/"],
            ['id' => 114, 'follow_up_option_id' => 64, "response" => "link http://eshare.edgehill.ac.uk/5337/5/Havard%20Referencing%202014%20v2.4.pdf"],
            ['id' => 115, 'follow_up_option_id' => 65, "response" => "link https://www.gov.uk/register-to-vote"],
            ['id' => 116, 'follow_up_option_id' => 66, "response" => "link https://www.edgehill.ac.uk/services/study-room-bookings/"],
            ['id' => 117, 'follow_up_option_id' => 67, "response" => "link https://www.edgehill.ac.uk/registry/transferring-programmes/"],
            ['id' => 118, 'follow_up_option_id' => 68, "response" => "link https://www.edgehill.ac.uk/registry/programme-withdrawal/"],
            ['id' => 119, 'follow_up_option_id' => 69, "response" => "link https://www.edgehill.ac.uk/scholarships/calculator/"],
            ['id' => 120, 'follow_up_option_id' => 70, "response" => "link https://www.edgehill.ac.uk/edgehillsport/team-edge-hill/clubs/"],
            ['id' => 121, 'follow_up_option_id' => 71, "response" => "link https://www.edgehill.ac.uk/courses/business-information-systems/tab/modules/"],
            ['id' => 122, 'follow_up_option_id' => 72, "response" => "link https://www.edgehill.ac.uk/courses/information-technology-management-for-business/tab/modules/"],
            ['id' => 123, 'follow_up_option_id' => 73, "response" => "link https://www.edgehill.ac.uk/courses/robotics-and-artificial-intelligence/"],
            ['id' => 124, 'follow_up_option_id' => 74, "response" => "link https://www.edgehill.ac.uk/courses/computer-science-bsc/tab/modules/"],
            ['id' => 125, 'follow_up_option_id' => 75, "response" => "link https://www.edgehill.ac.uk/courses/computer-science-and-mathematics/tab/modules/"],
            ['id' => 126, 'follow_up_option_id' => 76, "response" => "link https://www.edgehill.ac.uk/courses/data-science/tab/modules/"],
            ['id' => 127, 'follow_up_option_id' => 77, "response" => "link https://www.edgehill.ac.uk/courses/computer-security-and-networks/tab/modules/"],
            ['id' => 128, 'follow_up_option_id' => 78, "response" => "link https://www.edgehill.ac.uk/courses/computing/tab/modules/"],
            ['id' => 129, 'follow_up_option_id' => 79, "response" => "link https://www.edgehill.ac.uk/courses/computing-games-programming/tab/modules/"],
            ['id' => 130, 'follow_up_option_id' => 80, "response" => "link https://www.edgehill.ac.uk/courses/computing-networking-security-and-forensics/tab/modules/"],
            ['id' => 131, 'follow_up_option_id' => 81, "response" => "link https://www.edgehill.ac.uk/courses/software-application-development/tab/modules/"],
            ['id' => 132, 'follow_up_option_id' => 82, "response" => "link https://www.edgehill.ac.uk/courses/software-engineering/tab/modules/"],
            ['id' => 133, 'follow_up_option_id' => 83, "response" => "link https://www.edgehill.ac.uk/courses/web-design-and-development/tab/modules/"],
            ['id' => 134, 'follow_up_option_id' => 84, "response" => "link https://go.edgehill.ac.uk/vle"],
        ]);
    }
}