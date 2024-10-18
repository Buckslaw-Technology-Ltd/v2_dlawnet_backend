<?php

namespace Modules\Bank\Database\Enums;

enum AccountTypeEnum: string
{

    case UniversityStudents ='university';

    case LawSchoolStudents = 'law_school';

     case AllAccountTypes = 'all';

}
