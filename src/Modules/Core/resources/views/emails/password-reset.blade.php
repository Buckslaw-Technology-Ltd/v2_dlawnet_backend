<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <style type="text/css">
        td {
            vertical-align: top;
        }

        #email {
            margin: auto;
            width: 600px;
            background-color: white;
        }

        .ruler {
            margin: 0px 62px;
        }
    </style>
</head>

<body
    style="
      width: 100%;
      margin: auto 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      word-break: break-word;
    ">
    <div id="email">
        <table role="presentation" border="0" cellpadding="0" width="100%" style="padding: 30px 0px 30px 00px">
            <tr>
                <td style="
              font-family: 'Poppins', sans-serif;
              display: flex;
              justify-content: space-between;
            "
                    class="ruler">
                    <h2
                        style="
                color: #000;
                text-align: justify;
                font-family: Inter;
                font-size: 20px;
                font-style: normal;
                font-weight: 600;
                line-height: 28px;
              ">
                        Faculte
                    </h2>
                    <p
                        style="
                color: #8b8b8b;
                font-family: Poppins;
                font-size: 18px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
              ">
                        @php
                            
                            use Carbon\Carbon;
                        @endphp
                        {{ Carbon::now() }}

                    </p>
                </td>
            </tr>
        </table>

        <table role="presentation" width="100%" style="margin-top: 1px">
            <tr>
                <td align="left" class="ruler">
                    <div style="background-color: #ecf3ff; padding: 30px 30px" class="ruler">
                        <h5
                            style="
                  color: #323335;
                  text-align: justify;
                  font-family: Poppins;
                  font-size: 20px;
                  font-style: normal;
                  font-weight: 600;
                  line-height: 174%;
                ">
                            Hello, {{ $email }}
                        </h5>

                        <p
                            style="
                  color: #686868;
                  font-family: Poppins;
                  font-size: 20px;
                  font-style: normal;
                  font-weight: 500;
                  line-height: 174%;
                ">
                            Please copy the code below to reset your password.
                        </p>
                        <h3>{{ $code }}</h3>
                        {{-- <a href="{{ route('verify', [$code, \Modules\Users\Database\Enums\TokenTypeEnum::EMAIL_VERIFICATION]) }}"
                            style="
                  padding: 17px 31px;
                  justify-content: center;
                  background-color: #034cdd;
                  color: #fff;
                  border: none;
                  font-size: 20px;
                  font-family: 'Poppins', sans-serif;
                  border-radius: 5px;
                  text-decoration: none;
                ">
                            Click here to verify
                        </a> --}}
                        <p
                            style="
                  color: #686868;
                  font-family: Poppins;
                  font-size: 20px;
                  font-style: normal;
                  font-weight: 500;
                  line-height: 174%;
                ">
                            You can count on Faculte to provide top notch education through
                            our cutting edge e-learning platform. Engage, inspire and unlock
                            your full potential with us..
                        </p>
                    </div>
                </td>
            </tr>
        </table>

        <table role="presentation" width="100%">
            <tr>
                <td align="left">
                    <p
                        style="
                /* font-family: 'Poppins', sans-serif; */
                color: #323335;
                font-size: 20px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                margin: 0px 62px;
              ">
                        Best Regards,
                    </p>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <p
                        style="
                /* font-family: 'Poppins', sans-serif; */
                color: #323335;
                font-size: 20px;
                font-style: normal;
                font-weight: 600;
                line-height: normal;
                margin: 0px 62px;
              ">
                        Faculte
                    </p>
                </td>
            </tr>
        </table>

        <table role="presentation" width="100%" align="center">
            <tr>
                <td align="center" style="padding: 30px 30px">
                    <h6
                        style="
                color: #323335;
                text-align: center;
                font-size: 20px;
                font-style: normal;
                font-weight: 500;
              ">
                        Start learning today, join us
                    </h6>
                    <section>
                        <section
                            style="
                  display: grid;
                  grid-template-columns: repeat(2, minmax(0, 1fr));
                  column-gap: 10px;
                "
                            class="ruler">
                            <a href="#"
                                style="
                    font-family: 'Poppins', sans-serif;
                    color: #fff;
                    font-size: 16px;
                    background-color: #323335;
                    border: none;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    max-width: 250px;
                    text-decoration: none;
                    padding-left: 9px;
                    padding-right: 9px;
                    margin-top: 12px;
                  ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 40 40" fill="none">
                                    <path
                                        d="M33.3333 18.3333C32.8913 18.3333 32.4674 18.5089 32.1548 18.8215C31.8423 19.134 31.6667 19.558 31.6667 20V30C31.6667 30.442 31.4911 30.866 31.1785 31.1785C30.866 31.4911 30.442 31.6667 30 31.6667H10C9.55797 31.6667 9.13405 31.4911 8.82149 31.1785C8.50893 30.866 8.33333 30.442 8.33333 30V10C8.33333 9.55797 8.50893 9.13405 8.82149 8.82149C9.13405 8.50893 9.55797 8.33333 10 8.33333H20C20.442 8.33333 20.8659 8.15774 21.1785 7.84518C21.4911 7.53262 21.6667 7.10869 21.6667 6.66667C21.6667 6.22464 21.4911 5.80072 21.1785 5.48816C20.8659 5.17559 20.442 5 20 5H10C8.67392 5 7.40215 5.52678 6.46447 6.46447C5.52678 7.40215 5 8.67392 5 10V30C5 31.3261 5.52678 32.5979 6.46447 33.5355C7.40215 34.4732 8.67392 35 10 35H30C31.3261 35 32.5979 34.4732 33.5355 33.5355C34.4732 32.5979 35 31.3261 35 30V20C35 19.558 34.8244 19.134 34.5118 18.8215C34.1993 18.5089 33.7754 18.3333 33.3333 18.3333Z"
                                        fill="white" />
                                    <path
                                        d="M26.6667 8.33333H29.3001L18.8167 18.8C18.6605 18.9549 18.5365 19.1393 18.4519 19.3424C18.3673 19.5455 18.3237 19.7633 18.3237 19.9833C18.3237 20.2034 18.3673 20.4212 18.4519 20.6243C18.5365 20.8274 18.6605 21.0117 18.8167 21.1667C18.9717 21.3229 19.156 21.4469 19.3591 21.5315C19.5622 21.6161 19.78 21.6597 20.0001 21.6597C20.2201 21.6597 20.4379 21.6161 20.641 21.5315C20.8441 21.4469 21.0285 21.3229 21.1834 21.1667L31.6667 10.7V13.3333C31.6667 13.7754 31.8423 14.1993 32.1549 14.5118C32.4674 14.8244 32.8914 15 33.3334 15C33.7754 15 34.1993 14.8244 34.5119 14.5118C34.8245 14.1993 35.0001 13.7754 35.0001 13.3333V6.66667C35.0001 6.22464 34.8245 5.80072 34.5119 5.48816C34.1993 5.17559 33.7754 5 33.3334 5H26.6667C26.2247 5 25.8008 5.17559 25.4882 5.48816C25.1757 5.80072 25.0001 6.22464 25.0001 6.66667C25.0001 7.10869 25.1757 7.53262 25.4882 7.84518C25.8008 8.15774 26.2247 8.33333 26.6667 8.33333Z"
                                        fill="white" />
                                </svg>
                                <p style="margin-left: 15px">faculte.com</p>
                            </a>
                            <a href="#"
                                style="
                    font-family: 'Poppins', sans-serif;
                    color: #fff;
                    font-size: 16px;
                    background-color: #323335;
                    border: none;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    max-width: 250px;
                    text-decoration: none;
                    padding-left: 9px;
                    padding-right: 9px;
                    margin-top: 12px;
                  ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 40 40" fill="none">
                                    <path
                                        d="M3.75 4.64764V35.3508C3.75021 35.4174 3.77007 35.4824 3.80711 35.5378C3.84415 35.5932 3.89671 35.6364 3.9582 35.662C4.01969 35.6876 4.08738 35.6945 4.15277 35.6818C4.21816 35.6691 4.27835 35.6374 4.32578 35.5906L20.3125 20L4.32578 4.4078C4.27835 4.36103 4.21816 4.32931 4.15277 4.31661C4.08738 4.30391 4.01969 4.3108 3.9582 4.33642C3.89671 4.36203 3.84415 4.40523 3.80711 4.4606C3.77007 4.51596 3.75021 4.58103 3.75 4.64764ZM27.0156 13.5937L6.97031 2.54999L6.95781 2.54296C6.6125 2.35546 6.28437 2.82265 6.56719 3.09452L22.2805 18.1195L27.0156 13.5937ZM6.56875 36.9055C6.28438 37.1773 6.6125 37.6445 6.95938 37.457L6.97187 37.45L27.0156 26.4062L22.2805 21.8789L6.56875 36.9055ZM35.1078 18.0469L29.5102 14.964L24.2469 20L29.5102 25.0336L35.1078 21.9531C36.6305 21.1117 36.6305 18.8883 35.1078 18.0469Z"
                                        fill="white" />
                                </svg>
                                <p style="margin-left: 15px">
                                    <span
                                        style="
                        font-size: 12px;
                        font-style: normal;
                        font-weight: 400;
                      ">Coming
                                        soon
                                    </span>

                                    <br />
                                    Google Play
                                </p>
                            </a>
                        </section>
                        <a href="#"
                            style="
                  font-family: 'Poppins', sans-serif;
                  color: #fff;
                  font-size: 14px;
                  background-color: #323335;
                  border: none;
                  border-radius: 10px;
                  display: flex;
                  align-items: center;
                  max-width: 250px;
                  text-decoration: none;
                  padding-left: 9px;
                  padding-right: 50px;
                  margin-top: 12px;
                  width: fit-content;
                ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 40 40"
                                fill="none">
                                <path
                                    d="M29.1953 20.9258C29.1797 18.2617 30.3867 16.2539 32.8242 14.7734C31.4609 12.8203 29.3984 11.7461 26.6797 11.5391C24.1055 11.3359 21.2891 13.0391 20.2578 13.0391C19.168 13.0391 16.6758 11.6094 14.7148 11.6094C10.668 11.6719 6.36719 14.8359 6.36719 21.2734C6.36719 23.1758 6.71484 25.1406 7.41016 27.1641C8.33984 29.8281 11.6914 36.3555 15.1875 36.25C17.0156 36.207 18.3086 34.9531 20.6875 34.9531C22.9961 34.9531 24.1914 36.25 26.2305 36.25C29.7578 36.1992 32.7891 30.2656 33.6719 27.5938C28.9414 25.3633 29.1953 21.0625 29.1953 20.9258ZM25.0898 9.01172C27.0703 6.66016 26.8906 4.51953 26.832 3.75C25.082 3.85156 23.0586 4.94141 21.9062 6.28125C20.6367 7.71875 19.8906 9.49609 20.0508 11.5C21.9414 11.6445 23.668 10.6719 25.0898 9.01172Z"
                                    fill="white" />
                            </svg>
                            <p style="margin-left: 15px">
                                <span
                                    style="
                      font-size: 12px;
                      font-style: normal;
                      font-weight: 400;
                    ">
                                    Coming soon
                                </span>
                                <br />
                                App Store
                            </p>
                        </a>
                    </section>
                </td>
            </tr>
            <tr></tr>
        </table>
        <section style="background-color: #f1f1f1; padding: 19px 0px">
            <table role="presentation" border="0" cellpadding="0" cellspacing="1px" width="100%">
                <tr align="center">
                    <td style="display: flex; justify-content: center">
                        <div
                            style="
                  background-color: #034cdd;
                  width: 38.462px;
                  height: 38.462px;
                  flex-shrink: 0;
                  border-radius: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <g clip-path="url(#clip0_768_3817)">
                                    <path
                                        d="M23.426 5.43953C22.6231 5.7953 21.7606 6.03569 20.8538 6.14434C21.7894 5.58453 22.4894 4.70344 22.8231 3.6655C21.9441 4.1876 20.9821 4.55511 19.9788 4.75203C19.3042 4.03171 18.4106 3.55427 17.4368 3.39384C16.4631 3.2334 15.4635 3.39895 14.5935 3.86478C13.7234 4.33061 13.0315 5.07065 12.6251 5.97002C12.2188 6.86939 12.1207 7.87776 12.3461 8.83857C10.5651 8.74915 8.82271 8.28622 7.23213 7.47983C5.64155 6.67344 4.2383 5.54161 3.11345 4.1578C2.72884 4.82127 2.50768 5.5905 2.50768 6.40973C2.50726 7.14722 2.68887 7.87342 3.03641 8.52389C3.38396 9.17436 3.88669 9.72899 4.49999 10.1386C3.78872 10.1159 3.09314 9.92375 2.47115 9.578V9.63569C2.47107 10.6701 2.82887 11.6726 3.48382 12.4732C4.13877 13.2738 5.05054 13.8231 6.06442 14.028C5.40459 14.2066 4.71282 14.2329 4.04134 14.1049C4.32739 14.9949 4.8846 15.7732 5.63496 16.3308C6.38532 16.8884 7.29126 17.1974 8.22595 17.2145C6.63926 18.4601 4.67969 19.1358 2.66249 19.1328C2.30517 19.1329 1.94814 19.112 1.59326 19.0703C3.64083 20.3868 6.02436 21.0855 8.45865 21.0828C16.699 21.0828 21.2038 14.2578 21.2038 8.33857C21.2038 8.14627 21.199 7.95203 21.1904 7.75973C22.0666 7.12605 22.823 6.34136 23.424 5.44242L23.426 5.43953Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_768_3817">
                                        <rect width="23.0769" height="23.0769" fill="white"
                                            transform="translate(0.692383 0.692383)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div
                            style="
                  background-color: #034cdd;
                  width: 38.462px;
                  height: 38.462px;
                  flex-shrink: 0;
                  border-radius: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  margin-left: 0.875rem;
                ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M13.4201 20.8819V13.0011H16.0788L16.474 9.91553H13.4201V7.95014C13.4201 7.05976 13.6682 6.45014 14.9461 6.45014H16.5653V3.69918C15.7775 3.61475 14.9855 3.57398 14.1932 3.57707C11.8432 3.57707 10.2297 5.01168 10.2297 7.64534V9.90976H7.58838V12.9953H10.2355V20.8819H13.4201Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div
                            style="
                  background-color: #034cdd;
                  width: 38.462px;
                  height: 38.462px;
                  flex-shrink: 0;
                  border-radius: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  margin-left: 0.875rem;
                ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M2.20088 6.79171L10.8547 11.4406C11.1455 11.5963 11.5217 11.6702 11.9001 11.6702C12.2786 11.6702 12.6547 11.5963 12.9455 11.4406L21.5993 6.79171C22.1636 6.48825 22.6967 5.30786 21.6617 5.30786H2.13973C1.10473 5.30786 1.63781 6.48825 2.20088 6.79171ZM21.8613 9.33363L12.9455 13.9802C12.5532 14.1856 12.2786 14.2098 11.9001 14.2098C11.5217 14.2098 11.247 14.1856 10.8547 13.9802C10.4624 13.7748 2.62435 9.66594 1.98396 9.33248C1.53396 9.09709 1.53858 9.37286 1.53858 9.58517V18.0002C1.53858 18.4848 2.19165 19.154 2.69242 19.154H21.154C21.6547 19.154 22.3078 18.4848 22.3078 18.0002V9.58632C22.3078 9.37402 22.3124 9.09825 21.8613 9.33363Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <div
                            style="
                  background-color: #034cdd;
                  width: 38.462px;
                  height: 38.462px;
                  flex-shrink: 0;
                  border-radius: 100%;
                  display: flex;
                  justify-content: center;
                  align-items: center;
                  margin-left: 0.875rem;
                ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M11.7693 9.22669C10.1151 9.22669 8.76521 10.5766 8.76521 12.2307C8.76521 13.8849 10.1151 15.2348 11.7693 15.2348C13.4234 15.2348 14.7733 13.8849 14.7733 12.2307C14.7733 10.5766 13.4234 9.22669 11.7693 9.22669ZM20.7792 12.2307C20.7792 10.9868 20.7904 9.75403 20.7206 8.5123C20.6507 7.06999 20.3217 5.78994 19.267 4.73525C18.2101 3.67831 16.9323 3.35154 15.49 3.28168C14.246 3.21181 13.0133 3.22308 11.7715 3.22308C10.5275 3.22308 9.2948 3.21181 8.05307 3.28168C6.61076 3.35154 5.33071 3.68056 4.27602 4.73525C3.21908 5.79219 2.89231 7.06999 2.82245 8.5123C2.75259 9.75629 2.76385 10.989 2.76385 12.2307C2.76385 13.4725 2.75259 14.7075 2.82245 15.9492C2.89231 17.3915 3.22134 18.6716 4.27602 19.7262C5.33296 20.7832 6.61076 21.11 8.05307 21.1798C9.29706 21.2497 10.5298 21.2384 11.7715 21.2384C13.0155 21.2384 14.2482 21.2497 15.49 21.1798C16.9323 21.11 18.2123 20.7809 19.267 19.7262C20.324 18.6693 20.6507 17.3915 20.7206 15.9492C20.7927 14.7075 20.7792 13.4747 20.7792 12.2307ZM11.7693 16.8529C9.21142 16.8529 7.14712 14.7886 7.14712 12.2307C7.14712 9.6729 9.21142 7.6086 11.7693 7.6086C14.3271 7.6086 16.3914 9.6729 16.3914 12.2307C16.3914 14.7886 14.3271 16.8529 11.7693 16.8529ZM16.5807 8.49877C15.9835 8.49877 15.5012 8.0165 15.5012 7.4193C15.5012 6.82209 15.9835 6.33982 16.5807 6.33982C17.1779 6.33982 17.6602 6.82209 17.6602 7.4193C17.6604 7.56111 17.6326 7.70156 17.5784 7.8326C17.5242 7.96365 17.4447 8.08273 17.3444 8.183C17.2441 8.28327 17.1251 8.36278 16.994 8.41697C16.863 8.47115 16.7225 8.49895 16.5807 8.49877Z"
                                    fill="white" />
                            </svg>
                        </div>
                    </td>
                </tr>
            </table>
            <table role="presentation" border="0" cellpadding="0" cellspacing="1px" width="100%">
                <tr>
                    <p
                        style="
                font-family: 'Poppins', sans-serif;
                color: #8b8b8b;
                text-align: center;
                font-size: 14px;
                font-style: normal;
                font-weight: 500;
                line-height: 191%;
              ">
                        Copyright © 2023 Careermi Ltd, All rights reserved.
                    </p>
                </tr>
                <tr>
                    <h6
                        style="
                font-family: 'Poppins', sans-serif;
                color: #686868;
                text-align: center;
                font-size: 14px;
                font-style: normal;
                font-weight: 700;
              ">
                        Our mailing address is:
                    </h6>
                </tr>
                <tr>
                    <p
                        style="
                font-family: 'Poppins', sans-serif;
                color: #686868;
                font-size: 14px;
                font-style: normal;
                font-weight: 500;
                text-align: center;
              ">
                        15, Opebi street, Ikeja, Lagos, Nigeria.
                    </p>
                </tr>
            </table>
        </section>
    </div>
</body>

</html>
