/*  Copyright (c) MediaArea.net SARL. All Rights Reserved.
 *
 *  Use of this source code is governed by a GPLv3+/MPLv2+ license that can
 *  be found in the License.html file in the root of the source tree.
 */

//---------------------------------------------------------------------------
#ifndef Export_PBCoreH
#define Export_PBCoreH
//---------------------------------------------------------------------------

//---------------------------------------------------------------------------
#include "MediaInfo/MediaInfo_Internal.h"
//---------------------------------------------------------------------------

namespace MediaInfoLib
{

//***************************************************************************
/// @brief Export_PBCore
//***************************************************************************

class Export_PBCore
{
public :
    //Constructeur/Destructeur
    Export_PBCore ();
    ~Export_PBCore ();

    //Input
    Ztring Transform(MediaInfo_Internal &MI);
};

} //NameSpace
#endif
