@extends('layouts.master')
  @section('content')
    <div class="historySection sectionBackground section primaryFont">
      <div class="backBttn">
        <a href="{{ route('cemetery.index') }}" style="color:white"><< BACK</a>
      </div>
      <div class="sectionTitle">
        How You Can Help
      </div>
      <div class="helpSection">
        <div>
          We make constant efforts to respect those buried in our cemetery since we still see them as members of our Catholic family. One of these efforts is to regularly improve and update our records of those buried there. You can help us with this in several ways:
        </div>
        <div>
          <div class="helpSubtitle">
            Share Their Stories
          </div>
          <p>
            You can send factual and respectful information about the deceased to the Web Administrator at our <a style="color:gold" href="{{ route('cemetery.contact') }}">contact page</a>. This information should be relatively short, and it should only be about important facts that best represents the deceased person's life. Obituaries are good examples of this. Common information for our records includes:
          </p>
          <ul>
            <li>
              Dates of birth & death
            </li>
            <li>
              Parents
            </li>
            <li>
              Spouse(s) & children
            </li>
            <li>
              Their service to God, family, and/or country
            </li>
            <li>
              Any respectful, lifelong hobbies or passions
            </li>
          </ul>
        </div>
        <div>
          <div class="helpSubtitle">
            Clean Up The Details
          </div>
          <p>
            You can help us clarify some of the discrepancies that have developed within our own records. While reviewing our cemetery's records, we mostly referenced three sources: our hardcopy card list, our digital spreadsheet, and our cemetery's page on <a style="color:gold" href="https://www.findagrave.com/cemetery/1014232/sacred-heart-cemetery">FindAGrave</a>. These sources occasionally conflict with one another.
          </p>
          <p>
            Here is our list of discrepancies that we still need to resolve:
          </p>
          <!-- <div class="dataErrorRow">
            <div>
              William P. Alt
            </div>
            <div>
              Is William P. Alt still alive?
            </div>
          </div> -->
          <div class="dataErrorList">
            <div class="dataErrorRow">
              <div>
                Elizabeth/Elisabeth Best
              </div>
              <div>
                How is her first name actually spelled?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Jacob Best
              </div>
              <div>
                What is his actual date of death?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Unknown Biglin
              </div>
              <div>
                No Biglin matches the “Unknown Biglin” in <a href="https://www.findagrave.com/memorial/18683817/unknown-biglin" target="_blank">FindAGrave</a>. Could this be a “Robert Biglin”, who is in our records but with no dates?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Brannan vs. Brennan vs. Brennen vs. Brennon
              </div>
              <div>
                The similar last names in our records need to be clarified to ensure that our records remain true. Specific names include: Pauline, Robert, Owen, Henrietta, John, and Nettie. Alma is a special case because she also married <a href="https://www.findagrave.com/memorial/90413920/claude-r-ball" target="_blank">Claude Ball</a>, who was buried in Shebly.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Elisabeth Brodman
              </div>
              <div>
                She is said to be buried here according to FindAGrave, but there is no hardcopy card confirm it. She left her significant estate to Sacred Heart, so she was likely buried here.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John Brodman
              </div>
              <div>
                Although we have no card to confirmed that John was buried here, historical documents on FindAGrave gives strong evidence that he was indeed buried here somewhere.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Johannes Buchhold/Buchholz
              </div>
              <div>
                Is his named as Buchhold or Buchholz? Our spreadsheet spells as the Buchhold, but there is only a Buchholz hardcopy card like this.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John Burke
              </div>
              <div>
                There is no hardcopy card of this man, but <a href="https://www.findagrave.com/memorial/18680829/john-burke" target="_blank">he is on our FindAGrave</a> with a picture of the tombstone. Confirming that the same tombstone is in our cemetery would be enough.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                (Unknown) Burns
              </div>
              <div>
                The hardcopy card of this name is very empty, and it is not in FindAGrave. The only other information on the card it "Grandmother".
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Viola Curran
              </div>
              <div>
                This person's name is on FindAGrave and is a child of "J and C Curran", but not on any of our cemetery records.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Philomene Finnegan
              </div>
              <div>
                There is a hardcopy card of this person, but it also says “no evidence of her”.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Joseph Fisher
              </div>
              <div>
                Although there is no hardcopy card about this person, some <a href="https://www.findagrave.com/memorial/214044043/joseph-fisher" target="_blank">evidence on FindAGrave</a> indicates that they were buried here. First, their baptism records indicate that it happened at Sacred Heart. Second, this person did not show up on their census records after that family moved to Michigan.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Frances Gosser
              </div>
              <div>
                There are two names like this in both the cards and the spreadsheet, and they have spouses that match. Besides that, the second name shows no dates or parents. Are these two cards about the same person?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Teresa Gwirtz
              </div>
              <div>
                This person is not on the spreadsheet or a hardcopy card.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Maria Henicestarb/J. Henige/L. Henge
              </div>
              <div>
                There are several, very similar names that are likely some (or all) duplicates of one another.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Viola Horning
              </div>
              <div>
                Her name is not found in our records, but is on FindAGrave.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Elizabeth/Maria Hubert
              </div>
              <div>
                We need to confirm her OFFICIAL full name. FindAGrave only knows “Maria” is part of it, and it has Maria as her first name
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                (Baby Boy) Kurtzman
              </div>
              <div>
                There is no hardcopy card about an infant like this, in spite of there being on on FindAGrave.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Mary Leich
              </div>
              <div>
                There is no hardcopy card about this name.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Philip/Philomine Loude
              </div>
              <div>
                No "Loude" cards were found to confirm either of these names.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                J. McNamara/McNammara
              </div>
              <div>
                It's unclear which name is correct. Only the name McNamara showed up on the hardcopy card, but only McNammara is on FindAGrave
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Alphonsus/Alphonse Metzger
              </div>
              <div>
                The first name on the tombstone looks like "Alphonse", but it is very tough to tell.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                George & Flossie Gwirtz
              </div>
              <div>
                Both of this couple is shown as being with the Metzger and Gwirtz last names. Why?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Otillia Metzger (x2)
              </div>
              <div>
                Two Otillia Metzgers with different dates appear in FindAGrave, but neither are on our spreadsheet or hardcopy cards. In further complications, an "Ottila Sutter" seems to be connected to one of them as well.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Harold Moore
              </div>
              <div>
                This man's name does not appear in either our spreadsheet or hardcopy cards.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Henrietta Niebrugg
              </div>
              <div>
                This man's name does not appear in either our spreadsheet or hardcopy cards.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John Nolen
              </div>
              <div>
                This man is not in our records, but is found on FindAGrave.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Michael Nolen
              </div>
              <div>
                This man is not in our records, but is found on FindAGrave.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Cathleen Rondy
              </div>
              <div>
                Although Cathleen is on our parish spreadsheet, it is not on our hardcopy cards or FindAGrave. She was child less than 1 year old, her father was buried at Sacred Heart, while her mother was buried at the Mansfield Catholic Cemetery
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Fred/Frederick Shill
              </div>
              <div>
                The hardcopy card and tombstone calls him "Fred", but FindAGrave says "Frederick". Did the tombstone only shorten his name so that it fit?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Theodore Simon I
              </div>
              <div>
                He is not in our hardcopy cards or spreadsheet, but he is on FindAGrave. The author of <a href="https://www.findagrave.com/memorial/111202703/theodore-simon" target="_blank">this entry on FindAGrave</a> claims that "a care taker at the Sacred Heart Of Jesus Church Cemetery... that Theodore Simon I is buried here".
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Charles Sutter
              </div>
              <div>
                He has no hardcopy card and is not on the spreadsheet, but he is on FindAGrave (including a picture). He shares the same tombstone with Maurice, who was ~12 years old.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                M Sutter
              </div>
              <div>
                A hardcopy card and the spreadsheet confirms that this person is buried here. The first name is unclear, but likely Monica since that name is on the card's notes.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Mary Anna Sutter
              </div>
              <div>
                There is no hardcopy card matching "Mary Anna Sutter" on FindAGrave, but there is a card and tombstone that matches Anna Mariam of same dates. Are they the same person?
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Ottilia/Otilla Sutter
              </div>
              <div>
                There are two different ways that her first name is spelled.  <a href="https://www.findagrave.com/memorial/14461701/otilla-sutter" target="_blank">FindAGrave</a> spells it as "Otilla", while the spreadsheet and card spell it as "Otilia". The tombstone seems to give her nickname: "Tillia".
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                (Unknown) Sutter
              </div>
              <div>
                This person is only listed on <a href="https://www.findagrave.com/memorial/18683517/unknown-sutter" target="_blank">FindAGrave</a>, and its notes only say "Wife of Charles Sutter".
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                J T
              </div>
              <div>
                A hardcopy card confirms that this person is buried here, but the card has no facts besides their initials and plot location.
              </div>
            </div>
            <!-- <div class="dataErrorRow">
              <div>
                Mary Ann Tabor
              </div>
              <div>
                This name is only found in hardcopy cards, which indicates that she and her husband were/will be cremated there
              </div>
            </div> -->
            <div class="dataErrorRow">
              <div>
                Catherine Walser
              </div>
              <div>
                This name is not on a hardcopy card or the spreadsheet. However, there is <a href="https://www.findagrave.com/memorial/214001389/catherine-walser" target="_blank">strong evidence on FindAGrave</a> that she was buried here before her family migrated to Michigan.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Mary Walser
              </div>
              <div>
                Like with Catherine Walser, Mary Walter is not found in the parish records, but other reliable documents indicate that she was buried here. The evidence can be seen at her <a href="https://www.findagrave.com/memorial/182760406/mary-kleophea-walser" target="_blank">FindAGrave page</a>, and a fuller explanation is part of her <a href="https://www.findagrave.com/memorial/150110886/william-walser" target="_blank">son's page</a>.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                John D. Weaver
              </div>
              <div>
                There are differences between the birth dates and the middle names when comparing parish records and the <a href="https://www.findagrave.com/memorial/18740299/john-daniel-weaver" target="_blank">FindAGrave page</a>. The FindAGrave may be more credible, based on a picture that has the middle name starting with “D”, while the hardcopy card say “E”
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Brigitha Yetzer
              </div>
              <div>
                She is not in our parish records, but evidence on the <a href="http://yetzerfamilyinamerica.com" target="_blank">Yetzer heritage website</a> indicates that she is buried in our cemetery.
              </div>
            </div>
            <div class="dataErrorRow">
              <div>
                Jessie Zwilling
              </div>
              <div>
                It is unclear whether Jessie (and her husband, John) were buried here or at another Catholic church that goes by the name "Sacred Heart" in Pomeroy, OH. Jessie has a card in our records and is on our spreadsheet, but her husband's obituary talks about his burial at the church in Pomeroy. They both have FindAGrave pages at each church, although their Pomeroy pages use the name "Zwillinger". Our pages provide more information, but the Pomeroy pages have actual pictures of the couple's common tombstone. Identifying where the tombstones are could prove where the burials actually took place.
                </br>
                Bethlehem: <a href="https://www.findagrave.com/memorial/126489905/jessie-marie-zwillingJessie" target="_blank">Jessie</a> and <a href="https://www.findagrave.com/memorial/198330010/john-leo-zwilling" target="_blank">John</a>
                </br>
                Pomeroy: <a href="https://www.findagrave.com/memorial/95655083/jessie-m-zwillinger" target="_blank">Jessie</a> and <a href="https://www.findagrave.com/memorial/95655116/john-leo-zwillinger" target="_blank">John</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
