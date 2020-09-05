import { PDFDocument, StandardFonts } from 'pdf-lib'

const DEFAULT_BORDER_LENGTH = 60;

export default class QuestionMaker {
    constructor() {
        this.font = null
        this.border = 0
        this.info = null
    }

    async make(file) {
        const arrayBuffer = await file.arrayBuffer()
        const originalDocument = await PDFDocument.load(arrayBuffer)
        const finishedDocument = await PDFDocument.create()
        const embeddedPages = await finishedDocument.embedPages(originalDocument.getPages())

        const font = await finishedDocument.embedFont(StandardFonts.Helvetica)

        embeddedPages.forEach(page => {
            const newPage = finishedDocument.addPage()

            newPage.drawPage(page, {
                x: this.border,
                y: this.border,
                width: newPage.getWidth() - (2 * this.border),
                height: newPage.getHeight() - (2.2 * this.border),
            })

            this.renderInfo(newPage, font)
        })

        const array = await finishedDocument.save()
        const blob = new Blob([array], { type: 'application/pdf' })

        return blob
    }

    renderInfo(page, font) {
        if (! this.info) {
            return
        }

        page.setFont(font)

        const exam = this.info.exam.exam.typeString === 'mid' ? 'UTS' : 'UAS'
        const course = this.info.course.title
        const startYear = this.info.exam.exam.startYear
        const endYear = this.info.exam.exam.endYear

        page.moveTo(DEFAULT_BORDER_LENGTH, page.getHeight() - DEFAULT_BORDER_LENGTH)
        page.drawText(`Soal ${exam} ${course} ${startYear}/${endYear}`, {
            size: 12
        })

        page.moveTo(DEFAULT_BORDER_LENGTH, DEFAULT_BORDER_LENGTH)
        page.drawText('Diklat HMIF UNDIP', {
            size: 12
        })
    }

    withBorder(flag) {
        this.border = flag ? DEFAULT_BORDER_LENGTH : 0

        return this
    }

    withInfo(course, exam) {
        this.info = { course, exam }

        return this
    }
}
